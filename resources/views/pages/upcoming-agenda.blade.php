@extends('layouts.panel')

@section('title', 'Kegiatan Mendatang')

@section('content')
<div class="row">
   <div class="col-lg-8">
      @forelse($upcoming_agendas as $monthly => $agendas)
      <div class="card shadow-sm mb-3">
         <div class="card-header">
            <h3 class="card-title">{{ $monthly }}
               <small class="badge badge-secondary">{{ count($agendas) }}</small>
            </h3>
            <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i> </button> </div>
         </div>
         <div class="card-body p-0">
            <ul class="products-list product-list-in-card p-2">
               @foreach ($agendas as $agenda)
               <li class="item mx-3">
                  <div class="product-img">
                     <img src="{{ $agenda->image }}" alt="Ajeng S. W." class="img-size-50 img-circle">
                  </div>
                  <div class="product-info">
                     <a class="text-dark product-title">{{ $agenda->title }}</a>
                     <span class="product-description">
                        {{ $agenda->description }}
                     </span>
                     <span class="product-description">
                        <i class="far fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($agenda->start_date)->isoFormat('dddd, D MMMM YYYY') }}
                     </span>
                     <span class="product-description">
                        <i class="far fa-clock"></i>
                        {{ \Carbon\Carbon::parse($agenda->start_date)->isoFormat('HH.mm') }} WIB
                     </span>
                     @if($agenda->workunit_id)
                     <span class="product-description text-info">
                        <i class="fas fa-users"></i>
                        Terbatas
                     </span>
                     @endif
                     <a href="{{ route('agenda_detail', ['slug' => $agenda->slug]) }}"><span class="badge badge-info"><i
                              class="far fa-eye"></i> Detail</span></a>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
      @empty
      <div class="card shadow-sm mb-3">
         <div class="card-body text-muted">
            Belum ada kegiatan.
         </div>
      </div>
      @endforelse
   </div>
</div>
@endsection