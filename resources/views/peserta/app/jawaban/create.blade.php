@extends('peserta.layout.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('jawaban.index') }}" class="btn btn-primary mr-3">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <h4>Upload Jawaban</h4>
                </div>
                {!! Form::open(['files' => true]) !!}
                <div class="card-body">
                    <div class="form-group row mb-4">
                        {!! Form::label('jawaban', 'File Jawaban', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                        <div class="col-sm-7 col-md-7 col-12">
                            <div class="custom-file">
                                {!! Form::file('jawaban', ['class' => 'custom-file-input' . ($errors->has('jawaban') ? ' is-invalid' : null), 'required', 'accept' => 'application/zip']) !!}
                                {!! Form::label('jawaban', 'Choose File', ['class' => 'custom-file-label']) !!}
                            </div>
                            @error('jawaban')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <div class="form-group row">
                        <div class="col-md-7 col-lg-7 col-12 offset-md-3 offset-lg-3">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection

@push('javascript')
<script src="{!! asset('assets/modules/bs-custom-file-input/dist/bs-custom-file-input.min.js') !!}"></script>
@endpush