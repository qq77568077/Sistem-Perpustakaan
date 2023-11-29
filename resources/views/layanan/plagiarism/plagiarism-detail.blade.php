@extends('layouts.master')

@section('content')

<div class="main-content">
    <div class="title">
        Data Cek Plagiarism
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Nama</h4> 
                        {{$plagiarism->nama}}
                        <h4>NRP</h4> 
                        {{$plagiarism->nrp}}
                        <h4>File</h4> 
                        <a href="{{$plagiarism->file}}" target="_blank">{{$plagiarism->file}}</a>
                        <h4>Hasil Cek</h4> 
                        {{$plagiarism->hasil_cek}}
                        <h4>Keterangan</h4> 
                        {{$plagiarism->keterangan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
