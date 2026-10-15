import 'dart:async';
import 'dart:convert';
import 'package:dahimail/core/api.dart';
import 'package:dahimail/core/mail_sync.dart';
import 'package:dahimail/core/refresh.dart';
import 'package:dahimail/core/session.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:http/http.dart' as http;
import 'package:http/testing.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  setUp(Api.clearCache);
  test('mail sync works without an inbox widget and coalesces simultaneous callers', () async {
    final session = Session()..token = 'synthetic'..user = {'id': 1, 'active_workspace_id': 7};
    final release = Completer<void>(); var calls = 0;
    final before = AppRefresh.tick.value;
    await http.runWithClient(() async {
      final first = MailSync.sync(session);
      final second = MailSync.sync(session);
      await Future<void>.delayed(Duration.zero); release.complete();
      await Future.wait([first, second]);
      expect(calls, 1); expect(AppRefresh.tick.value, greaterThan(before));
    }, () => MockClient((request) async {
      expect(request.method, 'POST'); expect(request.url.path, endsWith('/inbox/sync'));
      calls++; await release.future;
      return http.Response(jsonEncode({'synced': 1, 'has_more': false}), 200);
    })); session.dispose();
  });
  test('background sync respects revoked identity between batches', () async {
    final session = Session()..token = 'synthetic'..user = {'id': 1}; var calls = 0; var active = true;
    await http.runWithClient(() async {
      await MailSync.sync(session, stillActive: () async => active);
      expect(calls, 1);
    }, () => MockClient((_) async {
      calls++; active = false;
      return http.Response('{"synced":1,"has_more":true}', 200);
    })); session.dispose();
  });
}
