<!DOCTYPE html>
<html>

<head>
    <title> Smart Movies | @yield('title') </title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="RoQaY">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Smart Movies website">
    <meta name="keywords" content=" Smart Movies ">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    
    @include('web.layouts.styles')
</head>

<body>

    <div class="body_wrapper">
       
        @yield('loading')
        
        @include('web.layouts.navbar')

        @yield('content')
       
        @include('web.layouts.footer')
        <span class="scroll-top"> <a href="#"><i class="fas fa-chevron-up"></i></a> </span>
    </div>
    
    @include('web.layouts.scripts')
</body>

</html>