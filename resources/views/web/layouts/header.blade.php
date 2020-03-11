<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    

    <meta name="viewport" content="width=device-width, initial-scale = 1.0,maximum-scale=1.0, user-scalable=no" /> 

    <link rel="shortcut icon" href="@if(setting()->logo_en !== null){{asset('public/storage/'.setting()->logo_en)}}@else {{ url('assets/images/qinana/logo.jpg') }} @endif" type="image/png" title="green kinan logo">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Tajawal&display=swap" rel="stylesheet">
    

    
    @if(direction() == 'ltr') 
    <title> @yield('title') | Green kinana , Sale and installation of artificial turf </title>
    <meta name="description" content="Shop with us for designer quality artificial flowers, flower arrangements, wedding flowers, Sale and installation of artificial turf.و Umbrellas and mounds">
        <link rel="stylesheet" href="{{url('/')}}/adminlte/dist/css/AdminLTE.min.css">
        <!-- css files  -->
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/img-animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        
    @else
        <title> @yield('title') | الكنانة الخضراء بيع وتركيب العشب الصناعي </title>
        <link rel="stylesheet" href="{{url('/')}}/assets/css/rtl/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/rtl/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('/')}}/rtl/fonts/fonts-fa.css">
        <link rel="stylesheet" href="{{url('/')}}/rtl/profile.css">
        <link rel="stylesheet" href="{{url('/')}}/rtl/rtl.css">
        <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&amp;subset=arabic" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/img-animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/rtl_style.css') }}">
        <style>
            
            html,body{
                font-family: 'Cairo', sans-serif;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered{
                direction: rtl;
            }
            .date-in-invoices{float:left !important}
        </style>
    @endif

    


    <link href="https://fonts.googleapis.com/css?family=Cairo|Jomolhari&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">


</head>

<body>



