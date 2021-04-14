@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.peserta.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Create
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.master-data.peserta.index') }}">Data Peserta</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Peserta</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Kelompok</th>
                                        <th>Google Meet</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr class="text-center">
                                        <td>{!! $loop->iteration !!}.</td>
                                        <td>Kelompok {!! $item->nomor !!}</td>
                                        <td>
                                            <a href="//meet.google.com/{!! $item->kode_google_meet !!}" target="_blank">{!! $item->kode_google_meet !!}</a>
                                        </td>
                                        <td>
                                            <a href="{!! route('admin.master-data.peserta.edit', $item->id) !!}" class="btn btn-primary btn-icon" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {!! Form::open(['route' => ['admin.master-data.peserta.destroy', $item->id], 'class' => 'form-table-action', 'method' => 'DELETE']) !!}
                                            <button class="btn btn-danger btn-icon delete" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('javascript')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('javascript-custom')
<script>
    $('table').dataTable();
    $('.delete').on('click', function(e) {
        const submit = () => $(this).parent().submit()
        e.preventDefault()
        swal({
                title: 'Apakah anda yakin?'
                , text: 'Data tidak dapat dikembalikan setelah anda menghapus.'
                , icon: 'warning'
                , dangerMode: true
                , buttons: true
            })
            .then((result) => {
                if (result) {
                    submit()
                }
            })
    })
</script>
@endpush