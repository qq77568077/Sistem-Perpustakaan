@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="../vendor/chart.js/Chart.min.css">
@endpush

@section('content')
    <div class="main-content">
        <div class="title">
            Dashboard
        </div>
        <div class="content-wrapper">
            @foreach ($data as $item)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $item->nama }}
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $item->syarat !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/pages/index.min.js"></script>
@endpush
