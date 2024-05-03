@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Pengajuan Jilid/Cetak
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
                                        <tr>
                                            <th>#</th>
                                            <th>Prodi</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 1; @endphp
                                        @foreach ($jilids as $userId => $userFiles)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $userFiles->first()->user->mahasiswa->prodi->nama }}</td>
                                                <td>{{ $userFiles->first()->user->mahasiswa->nrp}}</td>
                                                <td>{{ $userFiles->first()->user->name }}</td>
                                                <td>
                                                    <button type="button" data-id="{{ $userId }}" data-jenis="detail"
                                                        class="btn btn-info btn-sm action"><i class="ti-eye"></i></button>
                                                </td>
                                            </tr>
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
                $.ajax({
                    method: 'GET',
                    url: "{{ route('pengajuan-jilid.show', ':user_id') }}".replace(':user_id',
                        userId),
                    success: function(response) {
                        window.location.href =
                            "{{ route('pengajuan-jilid.show', ':user_id') }}".replace(
                                ':user_id', userId);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
