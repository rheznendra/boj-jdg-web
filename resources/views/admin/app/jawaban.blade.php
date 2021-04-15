@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.jawaban-peserta.index') }}">Jawaban Peserta</a>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jawaban Peserta</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kelompok</th>
                                        <th>File</th>
                                        <th>Waktu Upload</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{!! $loop->iteration !!}.</td>
                                        <td>Kelompok {!! $item->Kelompok->nomor !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['admin.jawaban-peserta.download', $item->id]]) !!}
                                            <button class="btn btn-primary btn-icon">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{!! $item->upload_time !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['admin.jawaban-peserta.destroy', $item->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-danger btn-icon delete">
                                                <i class="fa fa-trash-alt"></i>
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