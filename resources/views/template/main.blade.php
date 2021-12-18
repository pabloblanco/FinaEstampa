<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 1.0
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
        <meta charset="ISO-8859-1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">        
        <title>Fina Estampa - ERP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/apple-touch-icon-57-precomposed.png') }}">  <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/apple-touch-icon-114-precomposed.png') }}">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/apple-touch-icon-72-precomposed.png') }}">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/apple-touch-icon-144-precomposed.png') }}">    <!-- For iPad Retina display -->

        <!-- Styles Customized -->
            @yield('styles')
        <!-- Styles Customized - END --> 

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
        <div class='page-topbar '>
            @include('template.partials.topbar')
        </div>
        <!-- END TOPBAR -->

        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">
                    @include('template.partials.sidebar')
                    @yield('counter1')
            </div>
            <!--  SIDEBAR - END -->

            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    @yield('counter2')
                    @yield('content')
                </section>
            </section>
            <!-- END CONTENT -->
            @include('template.partials.chatbar')
        </div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

        <!-- Scripts Customized -->
            @yield('scripts')
        <!-- Scripts Customized - END -->       

        <!-- General section box modal start -->
        @section('datamodal')
        @show
        <!-- modal end -->
    </body>
</html>
