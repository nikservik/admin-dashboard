@extends('admin-dashboard::layout')

@section('content')
    <h1 class="page-header">@lang('admin-dashboard::dashboard.title')</h1>
    <div class="flex flex-wrap my-4">
        @foreach ($modules as $module)
            <div class="p-2 w-full md:w-1/2">
                <div class="block bg-white shadow rounded-lg h-full">
                    <div class="px-4 py-5 rounded-t-lg bg-gradient-to-r from-indigo-500 to-purple-500 sm:px-6">
                        <a class="text-lg leading-6 font-medium text-white" href="/{{ config($module . '.route') }}">
                            @lang($module . '::admin.dashboard-name')
                        </a>
                    </div>
                    <div class="px-4 py-5">
                        @lang($module . '::admin.dashboard-description')
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

