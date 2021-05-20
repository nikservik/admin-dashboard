<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@lang('app.name') - @lang('admin-dashboard::layout.page-title')</title>
  <!-- Styles -->
  <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
  <link href="{{ asset('css/admin.css') }}?1" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="content bg-gray-100">
        <header id="nav">
            <div class="max-w-2xl mx-auto px-2">
                <a href="/" class="block font-bold text-4xl py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                  @lang('admin-dashboard::layout.title')
                </a>
                @stack('menu')
            </div>
        </header>
        <div class="max-w-2xl mx-auto py-4" id="content">
          @yield('content')
        </div>
    </div>
    <footer>
        <div class="max-w-lg mx-auto px-2">
            @ @lang('admin-dashboard::layout.copyright')
        </div>
    </footer>
  </div>
</body>
</html>
