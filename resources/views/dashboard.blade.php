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
            @foreach ($terms as $term)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $term->nama }}
                    </div>
                    <div class="card-body">
                        <p>{!! $term->syarat !!}</p>
                    </div>
                </div>
            @endforeach

            <div class="card mb-3">
                <div class="card-header">
                    <h2>Harga Jilid</h2>
                    <div id="price-container">
                        <!-- Data harga aktif akan ditampilkan di sini -->
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../assets/js/pages/index.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetchActivePrice();
            });

            document.addEventListener('DOMContentLoaded', function() {
                fetchActivePrice();
            });

            function fetchActivePrice() {
                fetch('/api/active-price')
                    .then(response => response.json())
                    .then(price => {
                        let priceContainer = document.getElementById('price-container');
                        if (price) {
                            let formattedPageBerwarnaPrice = formatNumber(price.pageBerwarnaPrice) || '0';
                            let formattedPageHitamPutihPrice = formatNumber(price.pageHitamPutihPrice) || '0';
                            let formattedSoftJilidPrice = formatNumber(price.softjilidprice) || '0';
                            let formattedHardJilidPrice = formatNumber(price.hardjilidprice) || '0';

                            let html = `
                    <div class="card mb-3">
                        <div class="card-header">
                            ${price.nama || 'Update Harga Aktif untuk Cetak/Jilid Laporan'}
                        </div>
                        <div class="card-body">
                            <p>Page Berwarna Price: Rp. ${formattedPageBerwarnaPrice}</p>
                            <p>Page Hitam Putih Price: Rp. ${formattedPageHitamPutihPrice}</p>
                            <p>Soft Jilid Price: Rp. ${formattedSoftJilidPrice}</p>
                            <p>Hard Jilid Price: Rp. ${formattedHardJilidPrice}</p>
                        </div>
                    </div>
                `;
                            priceContainer.innerHTML = html;
                        } else {
                            priceContainer.innerHTML = '<p>No active price available.</p>';
                        }
                    })
                    .catch(error => console.error('Error fetching active price:', error));
            }

            function formatNumber(number) {
                // Convert to string and add commas
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }
        </script>
    @endpush
