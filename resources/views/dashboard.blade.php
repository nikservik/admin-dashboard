<x-admin-dashboard-app>
    <div class="max-w-7xl mx-auto">
        <h1 class="page-header">@lang('admin-dashboard::dashboard.title')</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($modules as $module)
                <div class="block bg-white shadow md:rounded-lg h-full">
                    <div class="px-4 py-5 md:rounded-t-lg bg-gradient-to-r from-indigo-500 to-purple-500 sm:px-6">
                        <a class="text-lg leading-6 font-medium text-white" href="/{{ config($module . '.route') }}">
                            @lang($module . '::admin.dashboard-name')
                        </a>
                    </div>
                    <div class="px-4 py-5">
                        @lang($module . '::admin.dashboard-description')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-dashboard-app>

