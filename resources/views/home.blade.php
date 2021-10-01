<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  @include('partials.navebare')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
   @include('partials.sidebare')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- Main content -->
    <!-- /.content -->
  </div>
   @include('partials.footer')