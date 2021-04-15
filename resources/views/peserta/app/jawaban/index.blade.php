@extends('peserta.layout.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="alert alert-primary alert-has-icon">
                <div class="alert-icon"><i class="fa fa-info-circle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ketentuan Pengumpulan Jawaban</div>
                    <ul class="pl-3">
                        <li>Jawaban diunggah dalam format ekstensi zip.</li>
                        <li>Format nama file pengumpulan jawaban adalah "Kelompok (nomor kelompok) - BOJ 2021.zip". Contoh: Kelompok 99 - BOJ 2021.zip</li>
                        <li>Setiap jawaban per-soalnya dipisah per-folder, dengan nama folder Soal 1, Soal 2, dst.</li>
                        <li>Anda tetap dapat mengubah jawaban setelah anda mengunggah jawaban anda hingga batas waktu keterlambatan.</li>
                        <li>Batas waktu keterlambatan pengumpulan tugas adalah 5 menit, dimana setiap 1 menit akan dikurangi 1 poin.</li>
                        <li>Halaman pegumpulan jawaban akan ditutup setelah melewati batas waktu keterlambatan.</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Form</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        {!! Form::label('end_time', 'Batas Waktu :', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                        <div class="col-md-7 col-lg-7 col-12">
                            <p class="mb-0">{!! $soal->batas_waktu !!}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        {!! Form::label('jawaban', 'Jawaban Anda :', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                        <div class="col-md-7 col-lg-7 col-12">
                            @if($jawaban)
                            <a href="{!! route('jawaban.download') !!}">
                                <i class="fa fa-download"></i> Kelompok {!! auth()->user()->nomor !!} - BOJ 2021.zip
                            </a>
                            @else
                            <p class="mb-0">Jawaban belum diunggah.</p>
                            @endif
                        </div>
                    </div>
                    @if($jawaban)
                    <div class="form-group row mb-4">
                        {!! Form::label('time', 'Jam Pengumpulan/Perubahan :', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
                        <div class="col-md-7 col-lg-7 col-12">
                            <p class="mb-0">
                                {!! $jawaban->upload_time !!}
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
                @if($canUpload)
                <div class="card-footer bg-whitesmoke">
                    <div class="form-group row">
                        <div class="col-md-7 col-lg-7 col-12 offset-md-3 offset-lg-3">
                            @if($jawaban)
                            <a href="{!! route('jawaban.edit') !!}" class="btn btn-primary btn-icon">Edit Jawaban</a>
                            @else
                            <a href="{!! route('jawaban.create') !!}" class="btn btn-primary btn-icon">Upload Jawaban</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection