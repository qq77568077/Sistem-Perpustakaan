@extends('layouts.master')

@section('content')

<div class="main-content">
    <div class="title">
        Data Jilid & Cetak 
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <h4>Jenis Pengumpulan</h4> 
                        {{$jilid->pengumpulan->nama}}
                        <hr>
                        <h4>Judul</h4> 
                        {{$jilid->judul}}
                        <hr>
                        <h4>Page Berwarna</h4> 
                        {{$jilid->page_berwarna}}
                        <hr>
                        <h4>Page Hitam Putih</h4> 
                        {{$jilid->page_hitamPutih}}
                        <hr>
                        <h4>Exemplar</h4> 
                        {{$jilid->exemplar}}
                        <hr>
                        <h4>Cover</h4> 
                        {{$jilid->cover}}
                        <hr>
                        <h4>Total</h4> 
                        {{$jilid->total}}
                        <hr>
                        <h4>Bukti Pembayaran</h4> 
                        <a href="{{$jilid->bukti_pembayaran}}" target="_blank">{{$jilid->bukti_pembayaran}}</a>
                        <hr>
                        <h4>File</h4> 
                        <a href="{{$jilid->file}}" target="_blank">{{$jilid->file}}</a>
                        <hr>
                        <h4>Keterangan</h4> 
                        {{$jilid->keterangan}}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
