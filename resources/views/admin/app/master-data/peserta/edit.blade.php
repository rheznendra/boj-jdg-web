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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Peserta</h4>
                    </div>
                    {!! Form::model($data, ['method' => 'PATCH']) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('username', 'Username', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('username', $data->username, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('angkatan', 'Angkatan', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('angkatan', $data->angkatan, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('kode_google_meet', 'Kode Google Meet', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('kode_google_meet', null, ['class' => 'form-control' . ($errors->has('kode_google_meet') ? ' is-invalid' : null), 'placeholder' => 'abc-defg-hij', 'autocomplete' => 'off']) !!}
                                @error('kode_google_meet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @foreach ($data->Anggota()->get() as $index => $item)
                        <div class="form-group row mb-4">
                            {!! Form::label('nim_anggota[]', 'NIM Anggota ' . $index+1, ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nim_anggota[]', old('nim_anggota.' . $index) ?? $item->nim, ['class' => 'form-control' . ($errors->has('nim_anggota.' . $index) ? ' is-invalid' : null), 'autocomplete' => 'off']) !!}
                                @error('nim_anggota.' . $index)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4 form-separator">
                            {!! Form::label('nama_anggota[]', 'Nama Anggota ' . $index+1, ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('nama_anggota[]', old('nama_anggota.' . $index) ?? $item->nama, ['class' => 'form-control' . ($errors->has('nama_anggota.' . $index) ? ' is-invalid' : null), 'autocomplete' => 'off']) !!}
                                @error('nama_anggota.' . $index)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @endforeach
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Password</h4>
                    </div>
                    {!! Form::open(['method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('password', 'Password Baru', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : null), 'required']) !!}
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('password_confirmation', 'Konfirmasi Password Baru', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
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