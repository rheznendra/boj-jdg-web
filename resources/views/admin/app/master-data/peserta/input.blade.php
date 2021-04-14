<div class="form-group row mb-4">
    {!! Form::label('nim_anggota[]', 'NIM Anggota ' . $index, ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
    <div class="col-sm-7 col-md-7 col-12">
        {!! Form::text('nim_anggota[]', old('nim_anggota.' . $index-1) ?? $item->nim, ['class' => 'form-control' . ($errors->has('nim_anggota.' . $index-1) ? ' is-invalid' : null), 'autocomplete' => 'off']) !!}
        @error('nim_anggota.' . $index-1)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4 form-separator">
    {!! Form::label('nama_anggota[]', 'Nama Anggota ' . $index, ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
    <div class="col-sm-7 col-md-7 col-12">
        {!! Form::text('nama_anggota[]', old('nama_anggota.' . $index-1) ?? $item->nama, ['class' => 'form-control' . ($errors->has('nama_anggota.' . $index-1) ? ' is-invalid' : null), 'autocomplete' => 'off']) !!}
        @error('nama_anggota.' . $index-1)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>