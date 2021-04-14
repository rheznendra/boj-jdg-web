@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.home') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.settings.index') }}">Settings</a>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Change Username</h4>
                    </div>
                    {!! Form::open(['method' => 'PATCH']) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('username', 'Username', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::text('username', old('username') ?? auth()->guard('admin')->user()->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : null), 'required', 'autocomplete' => 'off']) !!}
                                @error('username')
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Change Password</h4>
                    </div>
                    {!! Form::open(['method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            {!! Form::label('password', 'Current Password', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
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
                            {!! Form::label('new_password', 'New Password', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::password('new_password', ['class' => 'form-control' . ($errors->has('new_password') ? ' is-invalid' : null), 'required']) !!}
                                @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {!! Form::label('new_password_confirmation', 'Confirm New Password', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                            <div class="col-sm-7 col-md-7 col-12">
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'required']) !!}
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