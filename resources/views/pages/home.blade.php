@extends('layouts.panel')

@section('title', 'Dasbor')

@section('content')
<div class="row">
    @if (session('status'))
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif
    <div class="col-md-8">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <h3 class="card-title">Kalender Kegiatan</h3>
            </div>
            <div class="card-body p-0">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <h3 class="card-title">Kegiatan Bulan Ini</h3>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card p-2">
                    @forelse($monthly_agendas as $agenda)
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
                            <a href="{{ route('agenda_detail', ['slug' => $agenda->slug]) }}"><span
                                    class="badge badge-info"><i class="far fa-eye"></i> Detail</span></a>
                        </div>
                    </li>
                    @empty
                    <li class="item mx-3 text-muted">
                        Belum ada kegiatan.
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection