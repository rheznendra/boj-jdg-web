@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.soal.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Create
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.master-data.soal.index') }}">Data Soal</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Soal</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Angkatan</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr class="text-center">
                                        <td>{!! $loop->iteration !!}.</td>
                                        <td>
                                            {!! Form::open(['route' => ['admin.master-data.soal.download', $item->id], 'method' => 'POST']) !!}
                                            <button class="btn btn-primary btn-icon">
                                                <i class="fa fa-download"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{!! $item->angkatan !!}</td>
                                        <td>{!! $item->start_time !!}</td>
                                        <td>{!! $item->end_time !!}</td>
                                        <td>
                                            <a href="{!! route('admin.master-data.soal.edit', $item->id) !!}" class="btn btn-primary btn-icon" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {!! Form::open(['route' => ['admin.master-data.soal.destroy', $item->id], 'class' => 'form-table-action', 'method' => 'DELETE']) !!}
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