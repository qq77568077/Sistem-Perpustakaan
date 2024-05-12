@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="../vendor/chart.js/Chart.min.css">
@endpush

@section('content')
    <div class="main-content">
        <div class="title">
            Dashboard
        </div>
        <div class="card">
            <div class="card-header">
                Persyaratan dan Ketentuan Cek Plagiarism
            </div>
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et libero sed mauris dignissim tincidunt.
                    Sed vitae arcu lectus. Integer pharetra ultricies purus non volutpat.
                </p>
                <p>
                    In hac habitasse platea dictumst. Sed pulvinar nisi eu felis suscipit, nec pretium risus pretium.
                    Integer et orci eu enim ultrices consequat.
                </p>
                <!-- Tambahkan konten persyaratan dan ketentuan di sini -->
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Persyaratan dan Ketentuan Jilid
            </div>
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et libero sed mauris dignissim tincidunt.
                    Sed vitae arcu lectus. Integer pharetra ultricies purus non volutpat.
                </p>
                <p>
                    In hac habitasse platea dictumst. Sed pulvinar nisi eu felis suscipit, nec pretium risus pretium.
                    Integer et orci eu enim ultrices consequat.
                </p>
                <!-- Tambahkan konten persyaratan dan ketentuan di sini -->
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Persyaratan dan Ketentuan Pengumpulan Berkas TA
            </div>
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et libero sed mauris dignissim tincidunt.
                    Sed vitae arcu lectus. Integer pharetra ultricies purus non volutpat.
                </p>
                <p>
                    In hac habitasse platea dictumst. Sed pulvinar nisi eu felis suscipit, nec pretium risus pretium.
                    Integer et orci eu enim ultrices consequat.
                </p>
                <!-- Tambahkan konten persyaratan dan ketentuan di sini -->
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/pages/index.min.js"></script>
@endpush
