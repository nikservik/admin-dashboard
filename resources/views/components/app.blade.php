<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('admin-dashboard::layout.page-title')</title>

    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="stylesheet" href="/css/admin.css?3">
    <livewire:styles />
</head>

<body>
    <div class="h-screen flex overflow-hidden overflow-y-scroll bg-gray-100">
        <!-- menu -->
        <x-admin-dashboard-menu :active="$active" :active-sub="$activeSub" />

        <div class="flex flex-col flex-1 overflow-x-hidden overflow-y-scroll">
            <!-- открывалка меню -->
            <div id="openMenu" class="fixed lg:hidden top-0 left-0 pt-2 z-40">
                <button type="button" class="flex items-center justify-center h-12 w-12 rounded-r-lg bg-blue-500">
                    <span class="sr-only">@lang('admin-dashboard::layout.open-menu')</span>
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- основной контент -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="md:px-4 lg:px-6 pt-16 lg:pt-4 pb-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
        const close = document.getElementById('closeMenu');
        const open = document.getElementById('openMenu');
        const menu = document.getElementById('menu');
        const shadow = document.getElementById('shadow');
        const compact = document.getElementById('compact');
        const widen = document.getElementById('widen');

        function openMenu() {
            menu.classList.remove('hidden');
            open.classList.add('hidden');
        }
        function closeMenu() {
            menu.classList.add('hidden');
            open.classList.remove('hidden');
        }
        function widenMenu() {
            menu.classList.remove('compact');
        }
        function compactMenu() {
            menu.classList.add('compact');
        }

        close.addEventListener('click', closeMenu)
        shadow.addEventListener('click', closeMenu)
        open.addEventListener('click', openMenu)
        compact.addEventListener('click', compactMenu)
        widen.addEventListener('click', widenMenu)
        menu.addEventListener('mouseover', widenMenu)
    </script>
    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</body>
</html>
