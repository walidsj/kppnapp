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
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar-daygrid/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar-timegrid/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar-bootstrap/main.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/locales/id.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<script>
   $(function() { var Calendar = FullCalendar.Calendar; var calendarEl = document.getElementById('calendar'); var calendar = new Calendar(calendarEl, { plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'], header: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek' }, 'themeSystem': 'bootstrap', locale: 'id', events: [ { title: '[Wajib] Pendaftaran Akun SIKKA BEM', start: '2020-07-11 19:00:00', end: '2020-07-12 12:00:00', url: 'https://sikka.bempknstan.org/kegiatan/detail/1594450877-wajib-pendaftaran-akun-sikka-bem', backgroundColor: '#3c8dbc', borderColor: '#3c8dbc' }, { title: 'Rapat Kabinet', start: '2020-07-12 09:00:00', end: '2020-07-12 12:00:00', url: 'https://sikka.bempknstan.org/kegiatan/detail/1594451322-rapat-kabinet', backgroundColor: '#3c8dbc', borderColor: '#3c8dbc' }, { title: 'RAPAT PLENO I', start: '2020-07-19 07:30:00', end: '2020-07-19 15:30:00', url: 'https://sikka.bempknstan.org/kegiatan/detail/1594715072-rapat-pleno-i', backgroundColor: '#3c8dbc', borderColor: '#3c8dbc' }, { title: 'RAPAT PLENO II', start: '2020-09-27 07:30:00', end: '2020-09-27 15:00:00', url: 'https://sikka.bempknstan.org/kegiatan/detail/1601134565-rapat-pleno-ii', backgroundColor: '#3c8dbc', borderColor: '#3c8dbc' }, { title: 'RAPAT PLENO III', start: '2020-12-06 07:30:00', end: '2020-12-06 14:00:00', url: 'https://sikka.bempknstan.org/kegiatan/detail/1607200427-rapat-pleno-iii', backgroundColor: '#3c8dbc', borderColor: '#3c8dbc' }, ], editable: false, droppable: false }); calendar.render(); }) 
</script>
@endsection