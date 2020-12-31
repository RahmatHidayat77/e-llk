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
    <!--end:: Global Optional Vendors -->

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

    <script type="text/javascript" src="/assets/scripts/main.js"></script>
</body>

</html>
