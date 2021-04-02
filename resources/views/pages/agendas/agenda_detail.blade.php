@extends('layouts.panel')

@section('title', 'Detail Kegiatan')

@section('content')
<div class="row">
   <div class="col-lg-8">
      <div class="card shadow-sm mb-3">
         <div class="card-header p-2">
            <ul class="nav nav-pills">
               <li class="nav-item"><a class="nav-link active" href="#Deskripsi" data-toggle="tab">Deskripsi</a></li>
               <li class="nav-item"><a class="nav-link" href="#Lampiran" data-toggle="tab">Lampiran</a></li>
            </ul>
         </div>
         <div class="card-body">
            <div class="tab-content">
               <div class="tab-pane active" id="Deskripsi">
                  <div class="post">
                     <div class="user-block">
                        <a href="{{ $agenda_item->image }}">
                           <img class="img-circle" src="{{ $agenda_item->image }}" alt="{{ $agenda_item->title }}" />
                        </a>
                        <span class="username">
                           <h5 class="text-dark font-weight-bold">{{ $agenda_item->title }}</h5>
                        </span>
                        <span class="description">
                           Diselenggarakan oleh {{ $agenda_item->user->workunit->name }}
                        </span>
                     </div>
                     <p>{{ $agenda_item->description }}</p>
                  </div>
               </div>
               <div class="tab-pane" id="Lampiran">
                  <div class="timeline timeline-inverse">
                     <div class="time-label">
                        <span
                           class="bg-primary">{{ \Carbon\Carbon::parse($agenda_item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</span>
                     </div>
                     <div>
                        <i class="fas fa-box bg-primary"></i>
                        <div class="timeline-item">
                           <span class="time"><i class="far fa-clock"></i>
                              {{ \Carbon\Carbon::parse($agenda_item->created_at)->isoFormat('HH.mm') }} WIB</span>
                           <h3 class="timeline-header">
                              <a>{{ $agenda_item->user->name }}</a></h3>
                           <div class="timeline-body">Membuat kegiatan berjudul "{{ $agenda_item->title }}"
                              yang diselenggarakan oleh {{ $agenda_item->user->workunit->name }}. </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modal-default"> <i
                  class="fas fa-link mr-2"></i>Ubah Tautan
            </button> --}}
            <div class="modal fade" id="modal-default">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Masukkan Tautan</h4> <button type="button" class="close"
                           data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                     </div>
                     <form
                        action="https://sikka.bempknstan.org/kegiatan/detail/1594450877-wajib-pendaftaran-akun-sikka-bem"
                        method="post" accept-charset="utf-8"> <input type="hidden" name="edufy_token"
                           value="018e3d899be16ef5d74d059d99adc165">
                        <div class="modal-body">
                           <div class="form-group mb-3"> <label for="link_kegiatan">Tautan Meeting, Grup, Drive, dan
                                 lain-lain</label> <textarea id="link_kegiatan" name="link_kegiatan"
                                 class="form-control " rows="3"
                                 placeholder="https://meet.google.com">https://staner.id</textarea> </div>
                        </div>
                        <div class="modal-footer justify-content-between"> <button type="button" class="btn btn-default"
                              data-dismiss="modal">Batal</button> <button type="submit" class="btn btn-primary"><i
                                 class="fas fa-save mr-2"></i>Simpan Tautan</button> </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shadow-sm mb-3">
         <div class="card-body box-profile">
            <ul class="list-group list-group-unbordered mb-3">
               <li class="list-group-item border-0">
                  <b>Kegiatan Mulai</b>
                  <br>
                  {{ \Carbon\Carbon::parse($agenda_item->start_date)->isoFormat('dddd, D MMMM YYYY HH.mm') }} WIB
               </li>
               <li class="list-group-item border-0">
                  <b>Kegiatan Selesai</b>
                  <br>
                  {{ \Carbon\Carbon::parse($agenda_item->end_date)->isoFormat('dddd, D MMMM YYYY HH.mm') }} WIB
               </li>
               <li class="list-group-item border-0">
                  <b>Sifat Kegiatan</b>
                  <br>
                  {{ $agenda_item->status_agenda->name }}
               </li>
               <li class="list-group-item border-0">
                  <b>Partisipan Kegiatan</b>
                  <br>
                  @if($workunits)
                  Terbatas<br>
                  <ul>
                     @foreach($workunits as $workunit)
                     <li>{{ $workunit->code }} - {{ $workunit->name }}</li>
                     @endforeach
                  </ul>
                  @else
                  Semua Satuan Kerja
                  @endif
               </li>
               <li class="list-group-item border-0">
                  <b>Tautan</b>
                  <br>
                  <a href="https://zoom.us/present/9609021/4ndskjnfaoEsjdjnkSDueqwiQ">
                     https://zoom.us/present/9609021/4ndskjnfaoEsjdjnkSDueqwiQ
                  </a>
               </li>
            </ul>
            <a href="" class="btn btn-primary font-weight-bold"><i class="far fa-eye"></i> Daftar Hadir</a>
            <a href="" class="btn btn-success font-weight-bold float-right"><i class="far fa-bookmark"></i> Presensi</a>
         </div>
      </div>
   </div>
</div>
@endsection