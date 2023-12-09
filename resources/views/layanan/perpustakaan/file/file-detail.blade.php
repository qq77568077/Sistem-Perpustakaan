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
                        {{$file->user->name}}
                        <hr>
                        <table class="table">
                            <tr>
                                <thead>
                                    <th>Jenis File</th>
                                    <th>Bukti File</th>
                                    <th>Keterangan</th>
                                    <th>status</th>
                                </thead>
                                <tbody>
                                    @foreach($file->user->files as $d)
                                    <tr>
                                        <td>{{$d->document->dokumen}}</td>
                                        <td><a href="{{$d->bukti_file}}" target="_blank">{{$file->bukti_file}}</a></td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>{{$d->status}}</td>
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
    {{-- {{ $dataTable->scripts() }} --}}

    <script>
        const modal = new bootstrap.Modal($('#modalAction'))

        $('.btn-add').on('click', function() {
            $.ajax({
                method: 'GET',
                url: `{{ url('layanan/file/create') }}`,
                success: function(res) {
                    console.log(res);
                    $('#modalAction').find('.modal-dialog').html(res)
                    $('#modalAction').removeClass('edit-mode').find('#keterangan').parent().hide();
                    $('#modalAction').removeClass('edit-mode').find('#status').parent().hide();
                    modal.show()
                    store()
                }
            })
        })

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
                        window.LaravelDataTables["document-table"].ajax.reload()
                        modal.hide()
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

        $('#document-table').on('click', '.action', function() {
            let data = $(this).data()
            let id = data.id
            let jenis = data.jenis

            if (jenis === 'delete') {
                console.log('delete');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: `{{ url('layanan/file/') }}/${id}`,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                window.LaravelDataTables["document-table"].ajax.reload()

                                Swal.fire(
                                    'Deleted!',
                                    res.message,
                                    res.status
                                )
                            }
                        })
                    }
                })
                return
            }

            if(jenis === 'detail'){
            $.ajax({
                        method: 'GET',
                        url: `{{ url('layanan/file/')}}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            console.log('berhasil' ,res);
                            window.location.href = '{{ url('layanan/file/')}}/' + id;
                        }
                    })
                    return
        }

            $.ajax({
                method: 'get',
                url: `{{ url('layanan/file/') }}/${id}/edit`,
                success: function(res) {
                    $('#modalAction').find('.modal-dialog').html(res)
                    modal.show()
                    store()
                }
            })

        })
    </script>
@endpush