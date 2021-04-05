@extends('layouts.panel')

@section('title', 'Daftar Satker')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th>Nama Satker</th>
                                <th>Kode Satker</th>
                                <th>Kode BAES1</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script>
    $(function () {
        $('#datatable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [[ 1, 'asc' ]],
            "ajax": {
                "url": "{{ route('datatable_workunit') }}", 
                "type": "POST"
            },
            "columns": [
                { "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "orderable": false
                },
                { "data": "name" },
                { "data": "code" },
                { "data": "baes1" },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        var html = "<div class='text-nowrap'><a href='' class='badge badge-sm badge-warning'><i class='fas fa-edit'></i></a> "
                        html += "<a href='' class='badge badge-sm badge-danger'><i class='fas fa-trash'></i></a></div>"
                        return html
                    }, 
                    "orderable": false
                },
            ]
        })
    });
</script>
@endsection