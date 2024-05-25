@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="title">
            Input Bukti Pembayaran
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="statusAlert"></div> <!-- Menampilkan alert status -->
                            <form id="formSubmitPaymentProof" action="{{ route('jilid.submitPaymentProof', $jilid->id) }}"
                                method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="bukti_pembayaran">Link Bukti Pembayaran</label>
                                    <input type="url" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan formulir pembayaran berdasarkan status jilid
        function togglePaymentForm(status) {
            if (status === 'Belum Validasi') {
                $('#formSubmitPaymentProof').hide(); // Sembunyikan formulir pembayaran jika status adalah 'Belum Validasi'
                // Tampilkan alert danger
                $('#statusAlert').html(`
                <div class="alert alert-danger" role="alert">
                    Anda perlu menunggu validasi petugas sebelum mengirim bukti pembayaran.
                </div>
            `);
            } else if (status === 'Approved') {
                $('#formSubmitPaymentProof').show(); // Tampilkan formulir pembayaran jika status adalah 'Approved'
                // Sembunyikan alert jika sebelumnya ditampilkan
                $('#statusAlert').html('');
            }
        }

        // Panggil fungsi saat dokumen dimuat untuk memastikan status awalnya diproses
        $(document).ready(function() {
            const status = '{{ $jilid->status }}'; // Ambil status jilid dari variabel PHP
            togglePaymentForm(
            status); // Panggil fungsi untuk menampilkan atau menyembunyikan formulir berdasarkan status
        });

        // Menggunakan AJAX untuk mengirim data formulir tanpa menyegarkan halaman
        $('#formSubmitPaymentProof').on('submit', function(e) {
            e.preventDefault();
            const _form = this;
            const formData = new FormData(_form);

            $.ajax({
                method: 'POST',
                url: this.action,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.message,
                        });
                    } else if (res.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: res.message,
                        });
                    }
                },
                error: function(res) {
                    let error = res.responseJSON?.errors;
                    if (error) {
                        for (const [key, value] of Object.entries(error)) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: value,
                            });
                        }
                    }
                }
            });
        });
    </script>
@endpush
