<x-layouts.app :title="__('Friends & chats')">
    <x-friends.workspace>
        <div class="messenger-empty">
            <x-action-icon name="chat" />
            <h1 class="text-2xl font-semibold">{{ __('Your conversations, together') }}</h1>
            <p class="text-muted">{{ __('Choose a friend from the sidebar to chat, call, or start a meeting.') }}</p>
            <a href="{{ url('/meetings') }}" class="btn-secondary">{{ __('Open meetings') }}</a>
        </div>
    </x-friends.workspace>
</x-layouts.app>
