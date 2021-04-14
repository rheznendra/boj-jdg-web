@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.ketentuan-peraturan.index') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.master-data.ketentuan-peraturan.index') }}">Ketentuan & Peraturan</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Peserta</h4>
                    </div>
                    {!! Form::open(['method' => 'PATCH']) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('ketentuan', 'Ketentuan', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::textarea('ketentuan', old('ketentuan') ?? $ketentuan->text ?? null, ['class' => 'summernote-custom' . ($errors->has('ketentuan') ? ' is-invalid' : null), 'required']) !!}
                                @error('ketentuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('peraturan', 'Peraturan', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::textarea('peraturan', old('peraturan') ?? $peraturan->text ?? null, ['class' => 'summernote-custom' . ($errors->has('peraturan') ? ' is-invalid' : null), 'required']) !!}
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
<link rel="stylesheet" href="{!! asset('assets/modules/summernote/summernote-bs4.css') !!}">
@endpush

@push('javascript')
<script src="{!! asset('assets/modules/summernote/summernote-bs4.js') !!}"></script>
@endpush