@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Pengajuan Cek Plagiarism
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Nama</h4>
                            {{ $plagiarisms->user->name }}
                            <h4>NRP</h4>
                            {{ $plagiarisms->user->nrp }}

                            <div class="table-responsive">
                                <hr>
                                <table class="table" id="table-document">
                                    <tr>
                                        <thead>
                                            <th>ID</th>
                                            <th>File</th>
                                            <th>Hasil Cek</th>
                                            <th>Nilai Similarity</th>
                                            <th>Keterangan</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($plagiarisms->user->plagiarism as $d)
                                                <tr id="index_{{ $d->id }}">
                                                    <td>{{ $d->id }}</td>
                                                    <td><a href="{{ $d->file }}" target="_blank">Link File</a></td>
                                                    <td><a href="{{ $d->hasil_cek }}" target="_blank">Link File</a></td>
                                                    <td>{{ $d->similarity }}%</td>
                                                    <td>{{ $d->keterangan }}</td>
                                                    <td>{{ $d->status }}</td>
                                                    <td>
                                                        <button type="button" data-id="{{ $d->id }}"
                                                            data-jenis="edit" id="btn-edit"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="ti-pencil"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
        // });

        const modal = new bootstrap.Modal($('#modalAction'))

        function store() {
            $('#formAction').on('submit', function(e) {
                e.preventDefault();
                const _form = this;
                const formData = new FormData(_form);
                console.log(this);

                const url = _form.getAttribute('action');

                $.ajax({
                    method: 'POST',
                    url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $('#table-document').DataTable().ajax.reload(null, false);
                        $('#modalAction').modal('hide');
                    },
                    error: function(res) {
                        let error = res.responseJSON?.errors;
                        $(_form).find('.text-danger.text-small').remove();
                        if (error) {
                            for (const [key, value] of Object.entries(error)) {
                                $(`[name= '${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`)
                            }
                        }
                        console.log(error);
                    }
                });
            });
        }

        $('#table-document').on('click', '#btn-edit', function() {
            let data = $(this).data();
            let id = data.id;
            let jenis = data.jenis;
            console.log(id);
            console.log(jenis);

            $.ajax({
                method: 'get',
                url: `{{ url('layanan/pengajuan-plagiarism/') }}/${id}/edit`,
                success: function(res) {
                    $('#modalAction').find('.modal-dialog').html(res);
                    $('#modalAction').modal('show');
                    store();
                }
            });

        });
    </script>
@endpush
