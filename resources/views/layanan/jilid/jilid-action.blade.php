<div class="modal-content">
    <form id="formAction" action="{{ $jilid->id ? route('jilid.update', $jilid->id) : route('jilid.store') }} "
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($jilid->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Jilid</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ $jilid->judul }}" id="judul"
                            name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="page_berwarna">Jumlah Halaman Berwarna</label>
                        <input type="number" class="form-control" value="{{ $jilid->page_berwarna }}"
                            id="page_berwarna" name="page_berwarna">
                    </div>
                    <div class="mb-3">
                        <label for="page_hitamPutih">Jumlah Halaman Hitam/Putih</label>
                        <input type="number" class="form-control" value="{{ $jilid->page_hitamPutih }}"
                            id="page_hitamPutih" name="page_hitamPutih">
                    </div>
                    <div class="mb-3">
                        <label for="exemplar">Jumlah Examplar</label>
                        <input type="number" class="form-control" value="{{ $jilid->exemplar }}" id="exemplar"
                            name="exemplar">
                    </div>
                    <div class="mb-3">
                        <label for="cover">Jumlah Cover</label>
                        <input type="number" class="form-control" value="{{ $jilid->cover }}" id="cover"
                            name="cover">
                    </div>
                    <div class="mb-3">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" value="{{ $jilid->total }}" id="total"
                            name="total">
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $jilid->bukti_pembayaran }}"
                            id="bukti_pembayaran" name="bukti_pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="file">Link File Berkas</label>
                        <input type="text" class="form-control" value="{{ $jilid->file }}" id="file"
                            name="file">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name='keterangan'>{{ $jilid->keterangan }}</textarea>
                    </div>
                    <div class="mb-3" {{ $jilid->id ? 'edit-mode' : '' }}>
                        <label for="hasil_cek">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected>Open this select menu</option>
                            @php
                                $array = ['Validasi', 'Belum Validasi'];
                            @endphp
                            @foreach ($array as $element)
                                <option value="{{ $element }}">{{ $element }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<script>
    function updateCalculations() {
        const pageBerwarna = parseFloat(document.getElementById("page_berwarna").value);
        const pageHitamPutih = parseFloat(document.getElementById("page_hitamPutih").value);
        const cover = parseFloat(document.getElementById("cover").value);
        const exemplar = parseFloat(document.getElementById("exemplar").value);

        if (!isNaN(pageBerwarna) && !isNaN(pageHitamPutih) && !isNaN(cover) && !isNaN(exemplar)) {
            //ini mengambil dari table price 

            $.ajax({
                url: '{{ url('konfigurasi/getPriceData') }}',
                method: 'GET',
                success: function(response) {
                    const data = response.data[0]; // Mengambil data dari respons
                    const totalPageBerwarna = pageBerwarna * data.pageBerwarnaPrice;
                    const totalPageHitamPutih = pageHitamPutih * data.pageHitamPutihPrice;
                    const totalCover = cover * data.coverprice;
                    const totalPerjilid = exemplar * data.perjilidprice;
                    const total = (totalPageBerwarna + totalPageHitamPutih + totalCover + totalPerjilid);
                    document.getElementById("total").value = total;
                },
                error: function(xhr, status, error) {
                    console.log('ini Error', error);
                }
            });
        }
    }

    // Attach the calculation function to input change events
    document.getElementById("page_berwarna").addEventListener("input", updateCalculations);
    document.getElementById("page_hitamPutih").addEventListener("input", updateCalculations);
    document.getElementById("exemplar").addEventListener("input", updateCalculations);
    document.getElementById("cover").addEventListener("input", updateCalculations);

    // Calculate initial values
    updateCalculations();
</script>
