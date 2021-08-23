<div id="menu" class="fixed hidden lg:static lg:flex print:hidden inset-y-0 flex z-40" role="dialog" aria-modal="true">
    <!-- затемнитель -->
    <div id="shadow" class="fixed lg:hidden inset-0 bg-gray-400 bg-opacity-75" aria-hidden="true"></div>
    <div class="relative flex-1 flex flex-col max-w-xs pt-5 pb-4 bg-blue-500">
        <!-- закрывалка -->
        <div id="closeMenu" class="absolute lg:hidden top-0 right-0 -mr-12 pt-2 z-50">
            <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="sr-only">@lang('admin-dashboard::layout.close-menu')</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- logo -->
        <div class="flex-shrink-0 px-4">
            <div class="text-2xl text-white font-bold compact:hidden">ASTRO.EXPERT</div>
        </div>
        <!-- само меню -->
        <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2 space-y-1">
                <!-- Current: "bg-blue-800 text-white", Default: "text-blue-100 hover:bg-blue-600" -->
                <a href="/" class="@if($active == '') bg-blue-600 @endif hover:bg-blue-600 text-blue-50 text-white flex items-center px-2 py-2 text-base font-medium rounded-md">
                    <!-- Heroicon name: outline/home -->
                    <svg class="flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <div class="ml-4 inline-block compact:hidden">@lang('admin-dashboard::layout.home')</div>
                </a>
                @foreach ($modules as $module)
                    <a href="/{{ config($module . '.route') }}" class="@if($active == $module) bg-blue-600 @endif text-blue-50 hover:bg-blue-600 flex items-center px-2 py-2 text-base font-medium rounded-md">
                        <!-- Heroicon name: outline/users -->
                        <svg class="flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            @lang($module . '::admin.dashboard-icon-path')
                        </svg>
                        <div class="ml-4 inline-block compact:hidden">@lang($module . '::admin.dashboard-name')</div>
                    </a>
                @endforeach
            </nav>
        </div>
        <!-- сужатель меню -->
        <div class="flex-shrink-0 px-4 hidden lg:flex justify-end">
            <button id="compact" class="flex items-center justify-center h-6 w-6 text-blue-300 rounded-full outline-none ring-2 ring-inset ring-blue-300 compact:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="widen" class="hidden items-center justify-center h-6 w-6 text-blue-300 rounded-full outline-none ring-2 ring-inset ring-blue-300 compact:flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>
