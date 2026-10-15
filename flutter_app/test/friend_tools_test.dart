import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:http/http.dart' as http;
import 'package:http/testing.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:dahimail/core/api.dart';
import 'package:dahimail/core/session.dart';
import 'package:dahimail/core/notification_navigation.dart';
import 'package:dahimail/core/theme.dart';
import 'package:dahimail/screens/add_friend_page.dart';
import 'package:dahimail/screens/friends_screens.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  final messenger = TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger;
  final data = {'data': {'suggestions': [], 'incoming': [], 'outgoing': [], 'friends': [], 'phone': {'discoverable': false, 'discovery_available': true}}};
  setUp(() { SharedPreferences.setMockInitialValues({}); Api.clearCache(); });

  for (final (label, tab) in [('Friend requests', 1)]) {
    testWidgets('$label opens the intended view without asking for contacts', (tester) async {
      final session = Session()..token = ''..user = {'id': 1};
      var permissionRequests = 0;
      messenger.setMockMethodCallHandler(const MethodChannel('flutter_contacts'), (_) async { permissionRequests++; return null; });
      await http.runWithClient(() async {
        await tester.pumpWidget(ChangeNotifierProvider.value(value: session, child: MaterialApp(theme: AppTheme.light(), home: const Scaffold(floatingActionButton: FindFriendsButton()))));
        await tester.tap(find.text('Add friends'));
        await tester.pumpAndSettle();
        for (final action in ['Add friends', 'Friend requests', 'Contacts', 'Who can find me']) {
          expect(find.text(action), findsWidgets);
        }
        await tester.tap(find.text(label));
        await tester.pumpAndSettle();
        expect(tester.widget<FriendsPage>(find.byType(FriendsPage)).initialTab, tab);
        expect(permissionRequests, 0);
        if (tab == 3) {
          expect(find.text('Find friends from your contacts'), findsOneWidget);
          await tester.tap(find.text('Find friends from your contacts'));
          await tester.pumpAndSettle();
          expect(find.text('Allow'), findsOneWidget);
          expect(permissionRequests, 0); // Explanation still awaits the user's choice.
        }
        expect(tester.takeException(), isNull);
        await tester.pumpWidget(const SizedBox.shrink());
      }, () => MockClient((_) async => http.Response(jsonEncode(data), 200)));
      session.dispose();
      messenger.setMockMethodCallHandler(const MethodChannel('flutter_contacts'), null);
    });
  }

  testWidgets('search is one labeled menu action away at narrow width and larger font', (tester) async {
    tester.view.physicalSize = const Size(320, 640);
    tester.view.devicePixelRatio = 1;
    addTearDown(tester.view.resetPhysicalSize);
    addTearDown(tester.view.resetDevicePixelRatio);
    final session = Session()..token = ''..user = {'id': 1};
    await tester.pumpWidget(ChangeNotifierProvider.value(value: session, child: MaterialApp(theme: AppTheme.light(), builder: (c, child) => MediaQuery(data: MediaQuery.of(c).copyWith(textScaler: const TextScaler.linear(1.35)), child: child!), home: const Scaffold(floatingActionButton: FindFriendsButton()))));
    await tester.tap(find.text('Add friends'));
    await tester.pumpAndSettle();
    expect(tester.takeException(), isNull);
    await tester.tap(find.text('Add friends').last);
    await tester.pumpAndSettle();
    expect(find.byType(AddFriendPage), findsOneWidget);
    expect(find.byType(TextField), findsOneWidget);
    expect(tester.takeException(), isNull);
    await tester.pumpWidget(const SizedBox.shrink());
    session.dispose();
  });
  testWidgets('friend request notification opens received requests directly', (tester) async {
    final session = Session()..token = ''..user = {'id': 1};
    await http.runWithClient(() async {
      await tester.pumpWidget(ChangeNotifierProvider.value(value: session, child: MaterialApp(home: Builder(builder: (context) => Scaffold(body: TextButton(
        onPressed: () => NotificationNavigation.open(context, const {'type': 'friend_request'}), child: const Text('Open request'),
      ))))));
      await tester.tap(find.text('Open request'));
      await tester.pumpAndSettle();
      expect(tester.widget<FriendsPage>(find.byType(FriendsPage)).initialTab, 1);
      expect(find.text('No friend requests.'), findsOneWidget);
      await tester.pumpWidget(const SizedBox.shrink());
    }, () => MockClient((_) async => http.Response(jsonEncode(data), 200)));
    session.dispose();
  });

}
