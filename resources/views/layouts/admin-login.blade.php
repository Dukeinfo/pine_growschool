<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Login - Pinegrove School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Pinegrove School, Subathu" name="description" />
        <meta content="Pinegrove School, Subathu" name="keywords" />
        <meta content="Pinegrove School, Subathu" name="author" />
         <!-- Bootstrap Css -->
        <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_assets/css/admin-login.css') }}" rel="stylesheet">
        @livewireStyles
    </head>

    <body>
        <div class="container">
            {{ $slot }}
        </div>	

       
    </body>

     @livewireScripts
</html>