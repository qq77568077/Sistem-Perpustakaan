@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
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
                        {{$jilids->user->name}}
                        <h4>NRP</h4> 
                        {{$jilids->user->nrp}}
                        <div class="table-responsive">
                        <hr>
                        <table class="table text-center" id="table-jilid">
                            <tr>
                                <thead>
                                    <th>Judul</th>
                                    <th>Page Berwarna</th>
                                    <th>Page Hitam Putih</th>
                                    <th>Exemplar</th>
                                    <th>Hard File</th>
                                    <th>Soft File</th>
                                    <th>Total</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>File</th>
                                    <th>Keterangan</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($jilids->user->jilid as $d)
                                    <tr id="index_{{ $d->id }}">
                                        <td>{{$d->judul}}</td>
                                        <td>{{$d->page_berwarna}}</td>
                                        <td>{{$d->page_hitamPutih}}</td>
                                        <td>{{$d->exemplar}}</td>
                                        <td>{{$d->hard_jilid}}</td>
                                        <td>{{$d->soft_jilid}}</td>
                                        <td>{{$d->total}}</td>
                                        <td><a href="{{$d->bukti_Pembayaran}}" target="_blank">Link File</a></td>
                                        <td><a href="{{$d->file}}" target="_blank">Link File</a></td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>{{$d->status}}</td>
                                        <td>
                                            <button type="button" data-id="{{ $d->id }}" data-jenis="edit" id="btn-edit" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></button>
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
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
        
        const modal = new bootstrap.Modal($('#modalAction'))

        function store() {
            $('#formAction').on('submit', function(e) {
                e.preventDefault()
                const _form = this
                const formData = new FormData(_form)
                console.log(this);

                const url = this.getAttribute('action')

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
                        window.location.reload();
},
                    error: function(res) {
                        let error = res.responseJSON?.errors
                        $(_form).find('.text-danger.text-small').remove()
                        if (error) {
                            for (const [key, value] of Object.entries(error)) {
                                $(`[name= '${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`)
                            }
                        }
                        console.log(error);
                    }
                })
            })
        }

        $('#table-jilid').on('click', '#btn-edit', function() {
            let data = $(this).data()
            let id = data.id
            let jenis = data.jenis

            $.ajax({
                method: 'get',
                url: `{{ url('layanan/pengajuan-jilid/') }}/${id}/edit`,
                success: function(res) {
                    $('#modalAction').find('.modal-dialog').html(res)
                    modal.show()
                    store()
                }
            })

        })
    </script>
@endpush