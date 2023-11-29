@extends('layouts.master')

@section('content')

<div class="main-content">
    <div class="title">
        Data Berkas Tugas Akhir 
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Nama</h4> 
                        {{$berka->nama}}
                        <h4>NRP</h4> 
                        {{$berka->nrp}}
                        <h4>Judul</h4> 
                        {{$berka->judul}}
                        <h4>File Laporan TA</h4> 
                        <a href="{{$berka->laporan_ta}}" target="_blank">{{$berka->laporan_ta}}</a>
                        <h4>File Dokumen Penunjang</h4> 
                        <a href="{{$berka->dokumen_penunjang}}" target="_blank">{{$berka->dokumen_penunjang}}</a>
                        <h4>File Presentasi</h4> 
                        <a href="{{$berka->file_presentasi}}" target="_blank">{{$berka->file_presentasi}}</a>
                        <h4>File Product</h4> 
                        <a href="{{$berka->product}}" target="_blank">{{$berka->product}}</a>
                        <h4>Haki</h4> 
                        <a href="{{$berka->haki}}" target="_blank">{{$berka->haki}}</a>
                        <h4>Video Trailer</h4> 
                        <a href="{{$berka->video_trailer}}" target="_blank">{{$berka->video_trailer}}</a>
                        <h4>Poster</h4> 
                        <a href="{{$berka->poster}}" target="_blank">{{$berka->poster}}</a>
                        <h4>Artikel Jurnal</h4> 
                        <a href="{{$berka->artikel_jurnal}}" target="_blank">{{$berka->artikel_jurnal}}</a>
                        <h4>Keterangan</h4> 
                        {{$berka->keterangan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
