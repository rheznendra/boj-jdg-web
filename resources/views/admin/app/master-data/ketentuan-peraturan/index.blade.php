@extends('admin.layout.app')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.master-data.ketentuan-peraturan.edit') }}" class="btn btn-primary">
            <i class="fa fa-pencil-alt"></i> Edit
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
            <h2 class="section-title">Ketentuan & Peraturan</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($data as $item)
                        <div class="section-title">{!! ucfirst($item->kategori) !!}</div>
                        <p>{!! $item->text !!}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection