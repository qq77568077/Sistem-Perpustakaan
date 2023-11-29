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
                        <h4>Nama</h4> 
                        {{$jilid->nama}}
                        <h4>NRP</h4> 
                        {{$jilid->nrp}}
                        <h4>Judul</h4> 
                        {{$jilid->judul}}
                        <h4>Page Berwarna</h4> 
                        {{$jilid->page_berwarna}}
                        <h4>Page Hitam Putih</h4> 
                        {{$jilid->page_hitamPutih}}
                        <h4>Exemplar</h4> 
                        {{$jilid->exemplar}}
                        <h4>Cover</h4> 
                        {{$jilid->cover}}
                        <h4>Total</h4> 
                        {{$jilid->total}}
                        <h4>Bukti Pembayaran</h4> 
                        <a href="{{$jilid->bukti_pembayaran}}" target="_blank">{{$jilid->bukti_pembayaran}}</a>
                        <h4>File</h4> 
                        <a href="{{$jilid->file}}" target="_blank">{{$jilid->file}}</a>
                        <h4>Keterangan</h4> 
                        {{$jilid->keterangan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
