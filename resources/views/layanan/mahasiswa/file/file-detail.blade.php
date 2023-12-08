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
                        {{$berka->user_id}}
                        <hr>
                        <h4>jenis File</h4> 
                        {{$berka->jenis_file}}
                        <hr>
                        <h4>Bukti FIle</h4> 
                        <a href="{{$berka->bukti_file}}" target="_blank">{{$berka->bukti_file}}</a>
                        <hr>
                        <h4>Keterangan</h4> 
                        {{$berka->keterangan}}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
