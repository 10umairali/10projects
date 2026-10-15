@props(['active' => false, 'selectedId' => 0])
<link rel="stylesheet" href="{{ asset('css/messenger.css') }}?v=20261013-neutral-social">
<div class="messenger {{ $active ? 'has-conversation' : '' }}" x-data="{ profileOpen: false, discoveryOpen: false }" @keydown.escape.window="profileOpen = false">
    <aside class="messenger-sidebar" aria-label="{{ __('Friends and chats') }}">
        <header class="messenger-sidebar-header">
            <div><p class="messenger-eyebrow">{{ __('Your conversations') }}</p><h1 class="text-xl font-semibold">{{ __('Chats') }}</h1></div>
            <nav class="flex gap-3 text-sm text-brand" aria-label="{{ __('Chat activities') }}">
                <a class="messenger-icon" href="{{ url('/people/calls') }}" title="{{ __('Calls') }}" aria-label="{{ __('Calls') }}"><x-action-icon name="phone" /></a>
                <a class="messenger-icon" href="{{ url('/meetings') }}" title="{{ __('Meetings') }}" aria-label="{{ __('Meetings') }}"><x-action-icon name="calendar" /></a>
            </nav>
        </header>
        <div class="messenger-discovery">
            <button type="button" class="messenger-find" @click="discoveryOpen = !discoveryOpen" :aria-expanded="discoveryOpen.toString()"><x-action-icon name="search" /><span>{{ __('Find people') }}<small>{{ __('Search, connect and start a conversation') }}</small></span><span aria-hidden="true">+</span></button>
        </div>
        <div class="messenger-directory"><livewire:friends.friends-hub :compact="true" :selected-id="$selectedId" /></div>
    </aside>
    <main class="messenger-conversation" aria-label="{{ __('Conversation') }}">{{ $slot }}</main>
    <section x-cloak x-show="discoveryOpen" class="messenger-discovery-panel" aria-label="{{ __('Find people') }}" @keydown.escape.window="discoveryOpen = false">
        <header><div><p class="messenger-eyebrow">{{ __('Grow your circle') }}</p><h2>{{ __('Find people') }}</h2></div><button type="button" class="messenger-icon" @click="discoveryOpen = false" aria-label="{{ __('Close search') }}"><x-action-icon name="close" /></button></header>
        @include('friends._search')
    </section>
    @isset($profile)
        <aside x-cloak class="messenger-profile" :class="{ 'is-open': profileOpen }" aria-label="{{ __('Contact details') }}">
            <button type="button" class="messenger-profile-close messenger-icon" aria-label="{{ __('Close contact details') }}" @click="profileOpen = false"><x-action-icon name="close" /></button>
            {{ $profile }}
        </aside>
    @endisset
</div>
