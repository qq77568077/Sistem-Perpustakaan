@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Data Cek Plagiarism
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if (request()->user()->can('create layanan/plagiarism'))
                                <button type="button" class="btn btn-primary btn-sm mb-3 btn-add" id="addButton"> <i
                                        class="ti-plus"></i>
                                    Tambah</button>
                            @endif
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
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
    {{ $dataTable->scripts() }}

    <script>
        const modal = new bootstrap.Modal($('#modalAction'))
        const similarity = @json($similarity);

        function checkSimilarity() {
            if (similarity !== null && similarity <= 10) {
                $('#addButton').hide();
            } else {
                $('#addButton').show();
            }
        }

        function checkStatus() {
            const table = $('#plagiarism-table').DataTable();
            let showButton = table.rows().count() === 0; // Check if there are no rows

            // Iterate through each row to check status
            $('#plagiarism-table tbody tr').each(function() {
                let status = $(this).find('td').eq(4).text().trim();
                if (status === "File Tidak Bisa Dibuka") {
                    showButton = true;
                    return false; // Exit loop early
                }
            });

            // Tampilkan atau sembunyikan tombol "Tambah" berdasarkan status
            if (showButton) {
                $('#addButton').show();
            } else {
                $('#addButton').hide();
            }
        }

        $(document).ready(function() {
            checkSimilarity();

            // Initialize DataTable and add a draw event listener
            const table = $('#plagiarism-table').DataTable();

            // Call checkStatus when the table is drawn
            table.on('draw', function() {
                checkStatus();
            });

            $('.btn-add').on('click', function() {
                $.ajax({
                    method: 'GET',
                    url: `{{ url('layanan/plagiarism/create') }}`,
                    success: function(res) {
                        $('#modalAction').find('.modal-dialog').html(res)
                        $('#modalAction').removeClass('edit-mode').find('#hasil_cek').parent()
                            .hide();
                        $('#modalAction').removeClass('edit-mode').find('#keterangan').parent()
                            .hide();
                        $('#modalAction').removeClass('edit-mode').find('#status').parent()
                            .hide();
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
                    // console.log(this);

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
                            window.LaravelDataTables["plagiarism-table"].ajax.reload()
                            modal.hide()
                        },
                        error: function(res) {
                            let error = res.responseJSON?.errors
                            $(_form).find('.text-danger.text-small').remove()
                            if (error) {
                                for (const [key, value] of Object.entries(error)) {
                                    $(`[name= '${key}']`).parent().append(
                                        `<span class="text-danger text-small">${value}</span>`
                                    )
                                }
                            }
                            console.log(error);
                        }
                    })
                })
            }

            $('#plagiarism-table').on('click', '.action', function() {
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
                                url: `{{ url('layanan/plagiarism/') }}/${id}`,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(res) {
                                    window.LaravelDataTables["plagiarism-table"].ajax
                                        .reload()

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

                if (jenis === 'detail') {
                    $.ajax({
                        method: 'GET',
                        url: `{{ url('layanan/plagiarism/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            console.log('berhasil', res);
                            window.location.href = '{{ url('layanan/plagiarism/') }}/' + id;
                        }
                    })
                    return
                }

                // Check similarity before showing edit modal
                if (similarity !== null && similarity > 10) {
                    $.ajax({
                        method: 'get',
                        url: `{{ url('layanan/plagiarism/') }}/${id}/edit`,
                        success: function(res) {
                            $('#modalAction').find('.modal-dialog').html(res)
                            modal.show()
                            store()
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Cannot Edit',
                        text: "Nilai similiarity harus diatas 10% agar bisa di edit.",
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            })
        });
    </script>
@endpush
