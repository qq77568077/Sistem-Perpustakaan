@extends('layouts.master')

@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <style>
        .legend {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .legend h5 {
            margin-bottom: 10px;
            font-size: 1.25rem;
            color: #333;
        }

        .legend ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .legend ul li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 1rem;
            line-height: 1.5;
        }

        .legend ul li i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="title">
            Data Berkas TA
        </div>
        <div class="container">
            <form action="{{ route('file.index') }}" method="GET">
                <div class="row">
                    <div class="col-sm">
                        <label for="prodiFilter">Filter Prodi:</label>
                        <input type="text" class="form-control" id="prodiFilter" name="prodi"
                            value="{{ request()->input('prodi') }}" />
                    </div>
                    <div class="col-sm">
                        <label for="kategoriFilter">Filter Kategori TA:</label>
                        <select class="form-select" id="kategoriFilter" name="kategori">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request()->input('kategori') == $category->id ? 'selected' : '' }}>
                                    {{ $category->kategori_ta }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </form>
            <br>
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr align="center" valign="middle">
                                            <th>#</th>
                                            <th>Prodi</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Kategori TA</th>
                                            @foreach ($document as $doc)
                                                <th>{{ $doc->dokumen }}</th>
                                            @endforeach
                                            <th>Updated At</th> <!-- Tambahkan kolom baru -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 1; @endphp
                                        @foreach ($files as $userId => $userFiles)
                                            <tr align="center" valign="middle">
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $userFiles->first()->user->mahasiswa->prodi->nama }}</td>
                                                <td>{{ $userFiles->first()->user->mahasiswa->nrp }}</td>
                                                <td>{{ $userFiles->first()->user->name }}</td>
                                                <td>{{ $userFiles->first()->category->kategori_ta }}</td>
                                                @foreach ($document as $doc)
                                                    <td>
                                                        @php
                                                            $jenisFile = $userFiles
                                                                ->where('jenis_file', $doc->id)
                                                                ->first();
                                                        @endphp
                                                        @if ($jenisFile && $jenisFile->status === 'Valid')
                                                            <i class="fas fa-check-circle text-success"></i>
                                                        @elseif ($jenisFile && $jenisFile->status === 'Belum Validasi')
                                                            <i class="fas fa-hourglass-half text-info"></i>
                                                        @elseif ($jenisFile && $jenisFile->status === 'Tidak Valid')
                                                            <i class="fas fa-times-circle text-warning"></i>
                                                        @elseif ($jenisFile && $jenisFile->status === 'File Tidak Bisa Dibuka')
                                                            <i class="fas fa-times text-danger"></i>
                                                        @else
                                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <!-- Menampilkan tanggal pembaruan terakhir -->
                                                    {{ $userFiles->first()->updated_at->format('d-m-Y H:i:s') }}
                                                </td>
                                                <td>
                                                    <button type="button" data-id="{{ $userId }}"
                                                        data-jenis="detail" class="btn btn-info btn-sm action">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="legend">
                                <h5>Keterangan Status Berkas:</h5>
                                <ul>
                                    <li><i class="fas fa-check-circle text-success"></i> Valid: Berkas telah divalidasi dan
                                        sesuai</li>
                                    <li><i class="fas fa-hourglass-half text-info"></i> Belum Validasi: Berkas sudah
                                        diupload tetapi belum divalidasi</li>
                                    <li><i class="fas fa-times-circle text-warning"></i> Tidak Valid: Berkas sudah diupload
                                        tetapi tidak valid</li>
                                    <li><i class="fas fa-times text-danger"></i> File Tidak Bisa Dibuka: Berkas tidak dapat
                                        dibuka</li>
                                    <li><i class="fas fa-exclamation-circle text-danger"></i> Tidak Diupload: Mahasiswa
                                        belum mengupload berkas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $(document).ready(function() {
            $('.action').on('click', function() {
                var userId = $(this).data('id');

                // Lakukan permintaan AJAX
                $.ajax({
                    method: 'GET',
                    url: "{{ route('file.show', ':user_id') }}".replace(':user_id', userId),
                    success: function(response) {
                        // Lakukan sesuatu dengan respons dari AJAX, seperti menampilkan di modal atau halaman lain
                        // Contoh: Redirect ke halaman file-detail
                        window.location.href = "{{ route('file.show', ':user_id') }}".replace(
                            ':user_id', userId);
                    },
                    error: function(error) {
                        // Tangani kesalahan jika ada
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
