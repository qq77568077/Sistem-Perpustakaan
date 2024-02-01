@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Pengajuan Cek Plagiarism
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if (request()->user()->can('create layanan/pengajuan-plagiarism'))
                                <button type="button" class="btn btn-primary btn-sm mb-3 btn-add"> <i class="ti-plus"></i>
                                    Tambah</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Prodi</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 1; @endphp
                                        @foreach ($plagiarisms as $userId => $userFiles)
                                            @foreach ($userFiles as $plagiarism)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>{{ $plagiarism->created_at }}</td>
                                                    <td>{{ $plagiarism->user->prodi }}</td>
                                                    <td>{{ $plagiarism->user->nrp }}</td>
                                                    <td>{{ $plagiarism->user->name }}</td>
                                                    <td>{{ $plagiarism->status }}</td>
                                                    <td>
                                                        <button type="button" data-id="{{ $userId }}"
                                                            data-jenis="detail" class="btn btn-info btn-sm action"><i
                                                                class="ti-eye"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
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
            $('#myTable').DataTable();
        });

        $(document).ready(function() {
            $('.action').on('click', function() {
                var userId = $(this).data('id');

                // Lakukan permintaan AJAX
                $.ajax({
                    method: 'GET',
                    url: "{{ route('pengajuan-plagiarism.show', ':user_id') }}".replace(':user_id',
                        userId),
                    success: function(response) {
                        // Lakukan sesuatu dengan respons dari AJAX, seperti menampilkan di modal atau halaman lain
                        // Contoh: Redirect ke halaman file-detail
                        window.location.href =
                            "{{ route('pengajuan-plagiarism.show', ':user_id') }}".replace(
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
