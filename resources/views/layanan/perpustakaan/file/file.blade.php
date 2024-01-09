@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Berkas TA
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Mahasiswa</th>
                                        @foreach($document as $doc)
                                        <th>{{$doc->dokumen}}</th>
                                        @endforeach
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $userId => $userFiles)
                                    <tr>
                                        <td>{{ $userFiles->first()->user->name }}</td>
                                        @foreach($document as $doc)
                                        <td>
                                            @php
                                                $jenisFile = $userFiles->where('jenis_file', $doc->id)
                                                                    ->where('status', 'Validasi')
                                                                    ->first();
                                            @endphp
                                            @if($jenisFile && $jenisFile->status === 'Validasi')
                                            <i class="fas fa-check-circle text-success"></i>
                                            @else
                                            -
                                            @endif
                                        </td>
                                    @endforeach
                                        <td>
                                            <button type="button" data-id="{{ $userId }}" data-jenis="detail" class="btn btn-info btn-sm action"><i class="ti-eye"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
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
            $('.action').on('click', function() {
                var userId = $(this).data('id');

                // Lakukan permintaan AJAX
                $.ajax({
                    method: 'GET',
                    url: "{{ route('file.show', ':user_id') }}".replace(':user_id', userId),
                    success: function(response) {
                        // Lakukan sesuatu dengan respons dari AJAX, seperti menampilkan di modal atau halaman lain
                        // Contoh: Redirect ke halaman file-detail
                        window.location.href = "{{ route('file.show', ':user_id') }}".replace(':user_id', userId);
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
