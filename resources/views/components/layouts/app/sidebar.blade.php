<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <span class="text-lg font-semibold text-zinc-900 dark:text-white">
            {{ 'HR Management' }}</span>
        </a>
<flux:navlist x-data="{ openGroup: '' }">
    <flux:navlist.group :heading="__('Platform')"
        @click="openGroup = (openGroup === 'Platform' ? '' : 'Platform')"
        class="grid cursor-pointer">

        <div 
            x-show="openGroup === 'Platform'"
            x-collapse
            x-transition:enter="transition-all ease-out duration-500"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition-all ease-in duration-400"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="overflow-hidden will-change-transform will-change-opacity">

            <flux:navlist.item icon="home" :href="route('dashboard')" 
                :current="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navlist.item>
        </div>
    </flux:navlist.group>

    <flux:navlist.group :heading="__('Companies')"
        @click="openGroup = (openGroup === 'Companies' ? '' : 'Companies')"
        class="grid cursor-pointer">

        <div 
            x-show="openGroup === 'Companies'"
            x-collapse
            x-transition:enter="transition-all ease-out duration-500"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition-all ease-in duration-400"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="overflow-hidden will-change-transform will-change-opacity">
            <flux:navlist.item icon="building-office-2" :href="route('companies.index')"
                :current="request()->routeIs('companies.index')" wire:navigate>
                {{ __('List of companies') }}
            </flux:navlist.item>
            <flux:navlist.item icon="building-office" :href="route('companies.create')"
                :current="request()->routeIs('companies.create')" wire:navigate>
                {{ __('Create a new companie') }}
            </flux:navlist.item>

        </div>
    </flux:navlist.group>

    @if (session()->has('company_id'))

        <flux:navlist.group :heading="__('Departments')"
            @click="openGroup = (openGroup === 'Departments' ? '' : 'Departments')"
            class="grid cursor-pointer">

            <div 
                x-show="openGroup === 'Departments'"
                x-collapse
                x-transition:enter="transition-all ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all ease-in duration-400"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="overflow-hidden will-change-transform will-change-opacity">

                <flux:navlist.item icon="building-office-2" :href="route('departments.index')"
                    :current="request()->routeIs('departments.index')" wire:navigate>
                    {{ __('List of departments') }}
                </flux:navlist.item>
                <flux:navlist.item icon="plus" :href="route('departments.create')"
                    :current="request()->routeIs('departments.create')" wire:navigate>
                    {{ __('Create a new department') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>

        <flux:navlist.group :heading="__('Designations')"
            @click="openGroup = (openGroup === 'Designations' ? '' : 'Designations')"
            class="grid cursor-pointer">

            <div 
                x-show="openGroup === 'Designations'"
                x-collapse
                x-transition:enter="transition-all ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all ease-in duration-400"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="overflow-hidden will-change-transform will-change-opacity">

                <flux:navlist.item icon="briefcase" :href="route('designations.index')"
                    :current="request()->routeIs('designations.index')" wire:navigate>
                    {{ __('List of designations') }}
                </flux:navlist.item>
                <flux:navlist.item icon="plus" :href="route('designations.create')"
                    :current="request()->routeIs('designations.create')" wire:navigate>
                    {{ __('Create a new designation') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>

        <flux:navlist.group :heading="__('Employees')"
            @click="openGroup = (openGroup === 'Employees' ? '' : 'Employees')"
            class="grid cursor-pointer">

            <div 
                x-show="openGroup === 'Employees'"
                x-collapse
                x-transition:enter="transition-all ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all ease-in duration-400"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="overflow-hidden will-change-transform will-change-opacity">

                <flux:navlist.item icon="users" :href="route('employees.index')"
                    :current="request()->routeIs('employees.index')" wire:navigate>
                    {{ __('List of employees') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('employees.create')"
                    :current="request()->routeIs('employees.create')" wire:navigate>
                    {{ __('Create a new employee') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>

        <flux:navlist.group :heading="__('Contracts')"
            @click="openGroup = (openGroup === 'Contracts' ? '' : 'Contracts')"
            class="grid cursor-pointer">

            <div 
                x-show="openGroup === 'Contracts'"
                x-collapse
                x-transition:enter="transition-all ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all ease-in duration-400"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="overflow-hidden will-change-transform will-change-opacity">

                <flux:navlist.item icon="users" :href="route('contracts.index')"
                    :current="request()->routeIs('contracts.index')" wire:navigate>
                    {{ __('List of contracts') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('contracts.create')"
                    :current="request()->routeIs('contracts.create')" wire:navigate>
                    {{ __('Create a new contract') }}
                </flux:navlist.item>
            </div>
        </flux:navlist.group>

    @endif

</flux:navlist>


        <flux:spacer />

        <flux:dropdown>
            <flux:profile :name="App\Models\Company::find(session('company_id'))->name??'Select Company'"
                :initials="App\Models\Company::find(session('company_id'))->initials??'N/A'"
                icon-trailing="chevrons-up-down" />
            <flux:menu>
                @foreach (auth()->user()->companies as $company)
                    <flux:menu.radio.group>
                        @livewire('company-switch', ['company' => $company], key($company->id))
                    </flux:menu.radio.group>
                @endforeach
            </flux:menu>
        </flux:dropdown>

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" data-test="sidebar-menu-button" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
