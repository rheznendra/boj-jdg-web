@extends('peserta.layout.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">Kelompok {!! auth()->user()->nomor !!}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach (auth()->user()->Anggota()->get() as $item)
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="https://sicyca.dinamika.ac.id/static/foto/{!! $item->nim !!}.jpg" alt="avatar">
                            <div class="media-body">
                                <h6 class="media-title">{!! $item->nama !!}</h6>
                                <div class="text-small text-muted">{!! $item->nim !!}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @if($timeNow > $timeSoal)
        <div class="col-lg-6 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cloud-download-alt"></i>
                        </div>
                        <div class="card-body">
                            <h4>Download Soal</h4>
                            <p>Silahkan klik tulisan dibawah ini untuk mengunduh soal.</p>
                            <a href="{!! route('download') !!}" class="card-cta">Download <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="card-body">
                            <h4>Upload Jawaban</h4>
                            <p>Klik tulisan dibawah ini untuk membuka halaman upload jawaban.</p>
                            <a href="{!! route('jawaban.index') !!}" class="card-cta">Upload <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection