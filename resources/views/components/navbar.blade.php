<nav class="main-header navbar navbar-expand navbar-dark navbar-primary border-bottom-0 elevation-1">
   <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
               class="fas fa-bars"></i></a> </li>
      <li class="nav-item d-md-none"> <a class="brand-link">
            <span class=" brand-text text-white font-weight-bolder">@yield('title', config('app.name'))</span></a>
      </li>
   </ul>
   <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
            <img height="20" src="{{ asset('assets/img/user.png') }}" class="img img-circle " alt="">
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow">
            <a href="{{ route('home') }}" class="dropdown-item text-truncate">
               <span class="font-weight-bold">{{ Auth::user()->name }}</span>
               <br>
               <small class="text-muted">
                  {{ Auth::user()->workunit->code }} - {{ Auth::user()->workunit->name }}
                  <br>
                  {{ Auth::user()->position->name }}
               </small>
            </a>
            <a href="https://sikka.bempknstan.org/profil/pengaturan" class="dropdown-item dropdown-footer text-left">
               <i class="fas fa-cog mr-2"></i>Pengaturan Akun</a>
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="dropdown-item dropdown-footer text-left font-weight-bold">
                  <i class="fas fa-power-off mr-2 text-danger"></i>Logout
               </button>
            </form>
         </div>
      </li>
   </ul>
</nav>