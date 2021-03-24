<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('page_description', 'Laravel Calculator Program')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'Calculator')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            
            <!-- Error Display for Input Validation -->
            @if($errors->any())
                <div class="container">
                    <div class="alert alert-danger" role="alert">
                        <ul class='mb-0'>
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach    
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Flash Message -->
            @isset($flash_message) )
            <div class="container">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h3 id="flashmessage">{{ $flash_message }}</h3>
                </div>
            </div>
            @endisset

            @yield('content')
        </main>
    </div>
</body>
</html>