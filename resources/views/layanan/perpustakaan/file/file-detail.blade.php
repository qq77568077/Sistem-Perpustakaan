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
                        {{$file->nama}}
                        <hr>
                        <h4>NRP</h4> 
                        {{$file->nrp}}
                        <hr>
                        <h4>jenis File</h4> 
                        {{$file->jenis_file}}
                        <hr>
                        <h4>Bukti FIle</h4> 
                        <a href="{{$file->bukti_file}}" target="_blank">{{$file->bukti_file}}</a>
                        <hr>
                        <h4>Keterangan</h4> 
                        {{$file->keterangan}}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
