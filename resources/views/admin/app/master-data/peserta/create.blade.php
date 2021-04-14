@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.peserta.index') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.master-data.peserta.index') }}">Data Peserta</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Data Peserta</h4>
                    </div>
                    {!! Form::open() !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('angkatan', 'Angkatan', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::select('angkatan', [2019 => 2019, 2020 => 2020], null, ['class' => 'form-control' . ($errors->has('angkatan') ? ' is-invalid' : null), 'required', 'placeholder' => '------Pilih------']) !!}
                                @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('kode_google_meet', 'Kode Google Meet', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('kode_google_meet', null, ['class' => 'form-control' . ($errors->has('kode_google_meet') ? ' is-invalid' : null), 'required', 'placeholder' => 'abc-defg-hij', 'autocomplete' => 'off']) !!}
                                @error('kode_google_meet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('nim_anggota[]', 'NIM Anggota 1', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nim_anggota[]', null, ['class' => 'form-control' . ($errors->has('nim_anggota.0') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nim_anggota.0')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('nama_anggota[]', 'Nama Anggota 1', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nama_anggota[]', null, ['class' => 'form-control' . ($errors->has('nama_anggota.0') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nama_anggota.0')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('nim_anggota[]', 'NIM Anggota 2', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nim_anggota[]', null, ['class' => 'form-control' . ($errors->has('nim_anggota.1') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nim_anggota.1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('nama_anggota[]', 'Nama Anggota 2', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nama_anggota[]', null, ['class' => 'form-control' . ($errors->has('nama_anggota.1') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nama_anggota.1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('nim_anggota[]', 'NIM Anggota 3', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nim_anggota[]', null, ['class' => 'form-control' . ($errors->has('nim_anggota.2') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nim_anggota.2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('nama_anggota[]', 'Nama Anggota 3', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nama_anggota[]', null, ['class' => 'form-control' . ($errors->has('nama_anggota.2') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('nama_anggota.2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="row">
                            <div class="col-sm-7 col-md-7 offset-sm-3 offset-md-3 col-12">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Result</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::textarea('result', session()->get('result') ?? null, ['class' => 'form-control form-result', 'readonly']) !!}
                    </div>
                    @if(session()->has('result'))
                    <div class="card-footer bg-whitesmoke">
                        <button class="btn btn-primary" id="copy">Copy</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('javascript')
<script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
@endpush

@push('javascript-custom')
<script>
    new Cleave('input[name=kode_google_meet]', {
        delimiter: '-'
        , blocks: [3, 4, 3]
    })
    $('#copy').on('click', function() {
        let result = $('textarea[name=result]')
        result.select()
        document.execCommand("copy")
    })
</script>
@endpush