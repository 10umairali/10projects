import 'package:flutter/material.dart';
import 'notification_presentation.dart';
import 'widgets.dart';
import 'notify.dart';
import 'notification_actions.dart';

/// Compact sender banner shared by the notification center and in-app alerts.
class NotificationTile extends StatelessWidget {
  final Map notification;
  final VoidCallback onTap;
  final bool compact;
  const NotificationTile({super.key, required this.notification, required this.onTap, this.compact = false});

  @override
  Widget build(BuildContext context) {
    final n = notification;
    final style = NotificationPresentation.from(n);
    final unread = n['read'] != true;
    final name = NotificationPresentation.sender(n);
    return InkWell(
      onTap: onTap,
      borderRadius: BorderRadius.circular(14),
      child: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 10),
        child: Row(textDirection: TextDirection.ltr, children: [
          Stack(clipBehavior: Clip.none, children: [
            Avatar(name, url: NotificationPresentation.avatar(n), radius: 22),
            Positioned(right: -4, bottom: -4, child: Container(padding: const EdgeInsets.all(4), decoration: BoxDecoration(color: style.color, shape: BoxShape.circle, border: Border.all(color: Theme.of(context).colorScheme.surface, width: 2)), child: Icon(style.icon, size: 13, color: Colors.white))),
            if (unread) Positioned(right: 0, top: 0, child: Semantics(label: 'Unread', child: Container(width: 9, height: 9, decoration: BoxDecoration(color: style.color, shape: BoxShape.circle, border: Border.all(color: Theme.of(context).colorScheme.surface, width: 1.5))))),
          ]),
          const SizedBox(width: 10),
          Expanded(child: Column(crossAxisAlignment: CrossAxisAlignment.start, mainAxisSize: MainAxisSize.min, children: [
            Text(name, maxLines: 1, overflow: TextOverflow.ellipsis, style: Theme.of(context).textTheme.bodyMedium?.copyWith(fontWeight: unread ? FontWeight.w700 : FontWeight.w500)),
            const SizedBox(height: 4),
            Row(children: [
              Expanded(child: Text(style.action(n), maxLines: 2, overflow: TextOverflow.ellipsis, style: TextStyle(color: style.color, fontSize: 12))),
            ]),
            if (NotificationPresentation.body(n).isNotEmpty && !style.action(n).startsWith(NotificationPresentation.body(n))) Padding(padding: const EdgeInsets.only(top: 4), child: Text(NotificationPresentation.body(n), maxLines: 2, overflow: TextOverflow.ellipsis)),
            if (NotificationTarget.from(n) != null) Wrap(spacing: 4, children: [
              for (final action in ['view', 'reply', if (n['type'] == 'chat' && n['message_id'] != null) 'read'])
                TextButton(onPressed: () {
                  NotifyService.I.dismissBanner();
                  NotifyService.I.openRemote({...Map<String, dynamic>.from(n), 'notification_action': action});
                }, child: Text(action == 'view' ? 'View' : action == 'reply' ? 'Reply' : 'Mark as read')),
            ]),
            if (!compact && '${n['created_at'] ?? ''}'.isNotEmpty) Padding(padding: const EdgeInsets.only(top: 4), child: Text('${n['created_at']}', style: Theme.of(context).textTheme.bodySmall)),
          ])),
          const SizedBox(width: 10),

        ]),
      ),
    );
  }
}
