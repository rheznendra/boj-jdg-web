@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Home</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Kelompok</h4>
                    </div>
                    <div class="card-body">
                        {!! $kelompok !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Peserta</h4>
                    </div>
                    <div class="card-body">
                        {!! $peserta !!} Orang
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jawaban Diupload</h4>
                    </div>
                    <div class="card-body">
                        {!! $jawaban !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection