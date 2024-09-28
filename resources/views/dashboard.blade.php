<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="">
        <x-mary-nav sticky full-width>

            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>

                {{-- Brand --}}
                <div>App</div>
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
                <x-mary-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
                <x-mary-dropdown>
                    <x-mary-menu-item title="Archive" icon="o-archive-box" />
                    <x-mary-menu-item title="Remove" icon="o-trash" />
                    <x-mary-menu-item title="Restore" icon="o-arrow-path" />
                </x-mary-dropdown>
            </x-slot:actions>
        </x-mary-nav>

        {{-- The main content with `full-width` --}}
        <x-mary-main with-nav full-width>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

                {{-- User --}}
                {{-- @if($user = auth()->user())
                <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
                    <x-slot:actions>
                        <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff"
                            no-wire-navigate link="/logout" />
                    </x-slot:actions>
                </x-mary-list-item>

                <x-mary-menu-separator />
                @endif --}}

                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-mary-menu activate-by-route>
                    <x-mary-menu-item title="Home" icon="o-home" link="###" />
                    <x-mary-menu-item title="Messages" icon="o-envelope" link="###" />
                    <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
                        <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                    </x-mary-menu-sub>
                </x-mary-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                <x-pulse>
                    <livewire:pulse.servers cols="full" />
                
                    {{-- <livewire:pulse.usage cols="4" rows="2" /> --}}
                
                    <livewire:pulse.queues cols="4" />
                
                    <livewire:pulse.cache cols="4" />
                
                    <livewire:pulse.slow-queries cols="8" />
                
                    <livewire:pulse.exceptions cols="6" />
                
                    <livewire:pulse.slow-requests cols="6" />
                
                    <livewire:pulse.slow-jobs cols="6" />
                
                    <livewire:pulse.slow-outgoing-requests cols="6" />
                </x-pulse>
            </x-slot:content>
        </x-mary-main>

        {{-- TOAST area --}}
        <x-mary-toast />
    </div>
</x-app-layout>