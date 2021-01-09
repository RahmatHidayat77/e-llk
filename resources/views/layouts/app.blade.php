<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-LLK</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Lorem Ipsum Sit amet Mon Door">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->

    <!--begin:: Global Optional Vendors -->
    <link href="./main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <!--end:: Global Optional Vendors -->

    <style type="text/css">
        .card-body {
            background-color: #FFF;
        }

        .b-0 {
            border: 0 !important;
        }

    </style>

    <!--begin::Page Custom Styles(used by this page) -->
    @yield('page_styles')
    <!--end::Page Custom Styles -->

    <!--begin::Page Vendors Styles -->
    @yield('page_vendors_styles')
    <!--end::Page Vendors Styles -->

</head>

<body>
    @guest

        @yield('content')

    @else
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            @include('layouts.header')

            <!-- @include('layouts.setting') -->



            <!-- begin: content -->
            <div class="app-main">


                @include('layouts.aside')

                <div class="app-main__outer">
                    <div class="app-main__inner">

                        @yield('sub_header')

                        @yield('content')

                    </div>

                    @include('layouts.footer')

                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
            <!-- end:content  -->


        </div>
    @endguest



    @yield('modal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script type="text/javascript" src="/assets/scripts/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/vendor/sweetalert2@8.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            console.log('ready')
        });

    </script>

@yield('page_scripts')
</body>

</html>
