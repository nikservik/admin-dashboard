@extends('admin-dashboard::layout')

@section('content')
    <h1 class="page-header">@lang('admin-dashboard::dashboard.title')</h1>
    <div class="flex flex-wrap my-4">
        @foreach ($modules as $module)
            <div class="p-2 w-full md:w-1/2">
                <div class="block py-2 px-4 border border-gray-300 rounded-lg h-full">
                    <h3 class="text-2xl font-bold mb-3">
                        <a href="/{{ config($module . '.route') }}">
                            @lang($module . '::admin.dashboard-name')
                        </a>
                    </h3>
                    <div class="description">
                        @lang($module . '::admin.dashboard-description')
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

