<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>E- Kinerja</title>
    @include('includes.admin.styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
@include('includes.admin.navbar')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('includes.admin.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->

<!-- BEGIN: Footer-->
@include('includes.admin.footer')
<!-- END: Footer-->


@include('includes.admin.script')

<!-- BEGIN: Page JS-->

@stack('script')
{{--<script src="{{ url('admin/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>--}}
<!-- END: Page JS-->
{{--@yield('script')--}}

</body>
<!-- END: Body-->

</html>
