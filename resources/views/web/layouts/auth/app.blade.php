<!DOCTYPE html>
<html>

<head>
    <title> Smart Movies | @yield('title')</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="RoQaY">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Smart Movies website">
    <meta name="keywords" content=" Smart Movies ">
    <meta name="csrf-token" content="V2G8zLS7dL5HzdfwxaBDewvJvAKCyeThQE4NBtJv">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    
    @include('web.layouts.auth.styles')
</head>

<body>

    <div class="body_wrapper">
        
        @yield('loading')

        @include('web.layouts.auth.navbar')
       <div class="logo text-center">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('web/images/logo-m.png') }}" data-src="{{ asset('web/images/logo-m.png') }}"
            class="lazyload"></a>
       </div>
        
       
       @yield('content')
        
        @include('web.layouts.auth.footer')

  
    </div>

    @include('web.layouts.auth.scripts')
</body>

</html>