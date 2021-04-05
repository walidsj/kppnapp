<aside class="main-sidebar sidebar-light-primary shadow-sm"> <a href="{{ route('home') }}" class="brand-link"> <img
         src="{{ asset('assets/img/logo-siwanda.png') }}" alt="SIKKA BEM" class="brand-image"> <span
         class="brand-text font-weight-bolder">{{ config('app.name', 'Laravel') }}</span> </a>
   <div class="sidebar">
      <nav class="mt-3">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header font-weight-bold text-uppercase">Menu Navigasi</li>
            <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link @if(request()->routeIs('home')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dasbor</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('upcoming_agenda') }}"
                  class="nav-link @if(request()->routeIs('upcoming_agenda')) active @endif">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Kegiatan Mendatang</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('agenda') }}" class="nav-link @if(request()->routeIs('agenda')) active @endif">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Kegiatan Selesai</p>
               </a>
            </li>
            {{-- <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Grup Forum & FAQ</p>
            </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-phone"></i>
                  <p>Hubungi KPPN</p>
               </a>
            </li>
            <li class="nav-header font-weight-bold text-uppercase">Moderator</li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>Kegiatan</p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Buat Kegiatan</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Kegiatan</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>Konten</p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Postingan</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengumuman</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Administrasi User</p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Aktif</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Nonaktif</p>
                     </a>
                  </li>
               </ul>
            </li> --}}
            @if(Auth::user()->role == 'admin')
            <li class="nav-header font-weight-bold text-uppercase">Admin</li>
            <li class="nav-item has-treeview @if(request()->is('master/*')) menu-open @endif">
               <a href="#" class="nav-link @if(request()->is('master/*')) active @endif">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Data Master</p>
                  <i class="fas fa-angle-left right"></i>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('master_position') }}"
                        class="nav-link @if(request()->routeIs('master_position')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Jabatan</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('master_workunit') }}"
                        class="nav-link {@if(request()->routeIs('master_workunit')) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Satker</p>
                     </a>
                  </li>
               </ul>
            </li>
            @endif
            {{-- <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>Data Moderator</p>
            </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>Backup & Restore</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-exclamation-circle"></i>
                  <p>Info Aplikasi</p>
               </a>
            </li> --}}
         </ul>
      </nav>
   </div>
</aside>