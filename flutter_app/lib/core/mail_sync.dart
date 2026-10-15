import 'dart:async';
import 'api.dart';
import 'refresh.dart';
import 'session.dart';

/// Fetch mail independently of the visible tab. One request chain per account /
/// workspace avoids a kept inbox, the shell and resume all syncing at once.
class MailSync {
  static final _running = <String, Future<void>>{};

  static Future<void> sync(Session session, {Future<bool> Function()? stillActive}) async {
    final scope = Api.cacheScope(session), token = session.token;
    if (!session.isLoggedIn || scope == null) return;
    final key = '$scope/$token';
    final pending = _running[key];
    if (pending != null) return pending;
    final completer = Completer<void>();
    _running[key] = completer.future;
    try {
      final api = Api(session);
      // Publish every completed batch. A large initial backfill must not delay
      // the visible inbox until every page has finished.
      for (var batch = 0; batch < 2; batch++) {
        if (session.token != token || Api.cacheScope(session) != scope ||
            (stillActive != null && !await stillActive())) { break; }
        final result = await api.post('inbox/sync');
        if (session.token != token || Api.cacheScope(session) != scope ||
            (stillActive != null && !await stillActive())) { break; }
        AppRefresh.bump();
        if (result is! Map || result['has_more'] != true) break;
      }
    } catch (_) {
      // Server scheduler and the next foreground/background tick retry.
    } finally {
      _running.remove(key);
      completer.complete();
    }
  }
}
