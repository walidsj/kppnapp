@extends('layouts.app')

@section('body-class', 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed')

@section('app')
<div class="wrapper">
   @include('components.navbar')
   @include('components.sidebar')
   <div class="content-wrapper">
      @include('components.content-header')
      <section class="content">
         <div class="container-fluid">
            @yield('content')
         </div>
      </section>
   </div>
   @include('components.footer')
</div>
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
@endsection