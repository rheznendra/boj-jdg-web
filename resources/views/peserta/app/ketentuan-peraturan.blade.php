@extends('peserta.layout.app')

@section('content')
<section class="section">
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