
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">   

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="shortcut icon" href="{{ asset('/ico/favicon.ico')}}">

    <!-- Font Icon -->
    <link href="{{ asset('/css/plugin/font-awesome.min.css')}}" rel="stylesheet" type="text/css">  

    <!-- CSS Global -->
    <link href="{{ asset('/css/plugin/bootstrap.min.css')}}" rel="stylesheet" type="text/css">  
    <link href="{{ asset('/css/plugin/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">   
    <link href="{{ asset('/css/plugin/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/plugin/animate.css')}}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('/css/plugin/subscribe-better.css')}}" rel="stylesheet" type="text/css"> 

    <!-- Custom CSS -->
    <link href="{{ asset('/css/theme.css')}}" rel="stylesheet" type="text/css">
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
    </style>