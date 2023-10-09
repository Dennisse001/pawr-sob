<!DOCTYPE html>
<html lang="en">

@include('admin.header')

<body>

  <!-- ======= Header ======= -->
 @include('admin.sidebar')

 @yield('isi')

  <!-- ======= Footer ======= -->
  @include('admin.footer')

 @include('admin.js')
