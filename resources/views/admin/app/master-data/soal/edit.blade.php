@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.soal.index') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.master-data.soal.index') }}">Data Soal</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Soal</h4>
                    </div>
                    {!! Form::model($data, ['method' => 'PATCH','files' => true]) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('angkatan', 'Angkatan', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::select('angkatan', [2019 => 2019, 2020 => 2020], null, ['placeholder' => '------Pilih------', 'class' => 'form-control' . ($errors->has('angkatan') ? ' is-invalid' : null), 'required']) !!}
                                @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('file', 'File Soal <i class="fas fa-info-circle" data-toggle="tooltip" title="Ukuran file maksimal 5MB & ekstensi berupa pdf, zip, docx, doc."></i>', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3'], false) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                <div class="custom-file">
                                    {!! Form::file('file', ['class' => 'custom-file-input' . ($errors->has('file') ? ' is-invalid' : null), 'accept' => 'application/pdf,application/zip,application/x-rar,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword']) !!}
                                    {!! Form::label('file', 'Choose File', ['class' => 'custom-file-label']) !!}
                                </div>
                                @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('start_time', 'Tanggal & Waktu Mulai', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('start_time', null, ['class' => 'form-control datetimepicker' . ($errors->has('start_time') ? ' is-invalid' : null), 'required']) !!}
                                @error('start_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('end_time', 'Tanggal & Waktu Selesai', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('end_time', null, ['class' => 'form-control datetimepicker' . ($errors->has('end_time') ? ' is-invalid' : null), 'required']) !!}
                                @error('end_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="row">
                            <div class="col-sm-9 col-md-9 offset-sm-3 offset-md-3 col-12">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('stylesheet')
<link rel="stylesheet" href="{!! asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}">
@endpush

@push('javascript')
<script src="{!! asset('assets/modules/moment.min.js') !!}"></script>
<script src="{!! asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!}"></script>
<script src="{!! asset('assets/modules/bs-custom-file-input/dist/bs-custom-file-input.min.js') !!}"></script>
@endpush