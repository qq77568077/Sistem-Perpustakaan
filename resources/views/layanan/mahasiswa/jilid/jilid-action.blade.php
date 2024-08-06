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
                        <label for="jenis_pengumpulan">Jenis Pengumpulan</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_pengumpulan"
                            name="jenis_pengumpulan">
                            <option value="">Open this select menu</option>
                            @foreach ($pengumpulan as $p)
                                <option value="{{ $p->id }}"
                                    {{ $p->id == $jilid->jenis_pengumpulan ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                        <span class="error-message text-danger" id="jenis_pengumpulan-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ $jilid->judul }}" id="judul"
                            name="judul">
                        <span class="error-message text-danger" id="judul-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="page_berwarna">Jumlah Halaman Berwarna</label>
                        <input type="number" class="form-control" value="{{ $jilid->page_berwarna }}"
                            id="page_berwarna" name="page_berwarna">
                        <span class="error-message text-danger" id="page_berwarna-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="page_hitamPutih">Jumlah Halaman Hitam/Putih</label>
                        <input type="number" class="form-control" value="{{ $jilid->page_hitamPutih }}"
                            id="page_hitamPutih" name="page_hitamPutih">
                        <span class="error-message text-danger" id="page_hitamPutih-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exemplar">Jumlah Examplar</label>
                        <input type="number" class="form-control" value="{{ $jilid->exemplar }}" id="exemplar"
                            name="exemplar">
                        <span class="error-message text-danger" id="exemplar-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="hard_jilid">Jumlah Hard File</label>
                        <input type="number" class="form-control" value="{{ $jilid->hard_jilid }}" id="hard_jilid"
                            name="hard_jilid">
                        <span class="error-message text-danger" id="hard_jilid-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="soft_jilid">Jumlah Soft File</label>
                        <input type="number" class="form-control" value="{{ $jilid->soft_jilid }}" id="soft_jilid"
                            name="soft_jilid">
                        <span class="error-message text-danger" id="soft_jilid-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" value="{{ $jilid->total }}" id="total"
                            name="total">
                        <span class="error-message text-danger" id="total-error"></span>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $jilid->bukti_pembayaran }}"
                            id="bukti_pembayaran" name="bukti_pembayaran">
                    </div> --}}
                    <div class="mb-3">
                        <label for="file">Link File Berkas</label>
                        <input type="text" class="form-control" value="{{ $jilid->file }}" id="file"
                            name="file">
                        <span class="error-message text-danger" id="file-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name='keterangan'
                            placeholder="Wajib diisi dengan halaman-halaman yang ingin dicetak berwarna">{{ $jilid->keterangan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <h5>Catatan</h5>
                        <span>pengambilan berkas dapat di ambil setelah pembayaran disetujui</span>
                    </div>
                    <div class="mb-3" id="current-date">
                    </div>
                    <div class="mb-3" id="current-time">
                    </div>
                    @if (request()->user()->can('status layanan/jilid'))
                        <div class="mb-3" {{ $jilid->id ? 'edit-mode' : '' }}>
                            <label for="hasil_cek">Status</label>
                            <select class="form-select" name="status">
                                <option selected>Open this select menu</option>
                                @php
                                    $array = ['Validasi', 'Belum Validasi'];
                                    $selectedStatus = isset($jilid[0]['status']) ? $jilid[0]['status'] : null;
                                @endphp
                                @foreach ($array as $element)
                                    @if ($element === $selectedStatus)
                                        <option value="{{ $element }}" selected>{{ $element }}</option>
                                    @else
                                        <option value="{{ $element }}">{{ $element }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <select class="form-select" name="status">
                            <option value="Validasi" {{ $jilid->status === 'Validasi' ? 'selected' : '' }}>Validasi</option>
                            <option value="Belum Validasi" {{ $jilid->status === 'Belum Validasi' ? 'selected' : '' }}>Belum Validasi</option>
                        </select> --}}
                        </div>
                    @endif
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
        const hard_jilid = parseFloat(document.getElementById("hard_jilid").value);
        const soft_jilid = parseFloat(document.getElementById("soft_jilid").value);
        const exemplar = parseFloat(document.getElementById("exemplar").value);

        // Function to get and display the current time and date
        function displayCurrentTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            var day = currentTime.getDate();
            var month = currentTime.getMonth() + 1;
            var year = currentTime.getFullYear();

            // Format the time as HH:MM:SS
            var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' +
                seconds.toString().padStart(2, '0');

            // Format the date as DD/MM/YYYY
            var formattedDate = day.toString().padStart(2, '0') + '/' + month.toString().padStart(2, '0') + '/' +
                year.toString();

            // Display the time and date in a specific element on the form
            document.getElementById('current-time').textContent = 'Current Time: ' + formattedTime
            document.getElementById('current-date').textContent = 'Current Date: ' + formattedDate;
        }

        // Call the function to display the current time and date every second
        setInterval(displayCurrentTime, 1000);

        if (!isNaN(pageBerwarna) && !isNaN(pageHitamPutih) && !isNaN(hard_jilid) && !isNaN(soft_jilid) && !isNaN(
                exemplar)) {
            //ini mengambil dari table price 
            $.ajax({
                url: '{{ url('master/getPriceData') }}',
                method: 'GET',
                success: function(response) {
                    const data = response.data; // Mengambil data dari respons
                    const totalPageBerwarna = pageBerwarna * data.pageBerwarnaPrice;
                    const totalPageHitamPutih = pageHitamPutih * data.pageHitamPutihPrice;
                    const totalHardjilid = hard_jilid * data.hardjilidprice;
                    const totalSoftjilid = soft_jilid * data.softjilidprice;
                    const total = (totalPageBerwarna + totalPageHitamPutih + totalSoftjilid +
                        totalHardjilid);
                    document.getElementById("total").value = total;
                },
                error: function(xhr, status, error) {
                    console.log('ini Error', error);
                }
            });
        }
    }

    document.getElementById('formAction').addEventListener('submit', function(event) {
        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function(element) {
            element.textContent = '';
        });

        // Validation logic for each input field
        const jenisPengumpulan = document.getElementById('jenis_pengumpulan');
        if (jenisPengumpulan.value === '') {
            valid = false;
            document.getElementById('jenis_pengumpulan-error').textContent = 'Jenis Pengumpulan harus dipilih.';
        }

        const judul = document.getElementById('judul');
        if (judul.value.trim() === '') {
            valid = false;
            document.getElementById('judul-error').textContent = 'Judul tidak boleh kosong.';
        }

        const pageBerwarna = document.getElementById('page_berwarna');
        if (pageBerwarna.value.trim() === '' || pageBerwarna.value < 0) {
            valid = false;
            document.getElementById('page_berwarna-error').textContent =
                'Jumlah Halaman Berwarna tidak boleh kosong atau negatif.';
        }

        const pageHitamPutih = document.getElementById('page_hitamPutih');
        if (pageHitamPutih.value.trim() === '' || pageHitamPutih.value < 0) {
            valid = false;
            document.getElementById('page_hitamPutih-error').textContent =
                'Jumlah Halaman Hitam/Putih tidak boleh kosong atau negatif.';
        }

        const exemplar = document.getElementById('exemplar');
        if (exemplar.value.trim() === '' || exemplar.value < 0) {
            valid = false;
            document.getElementById('exemplar-error').textContent =
                'Jumlah Examplar tidak boleh kosong atau negatif.';
        }

        const hardJilid = document.getElementById('hard_jilid');
        if (hardJilid.value.trim() === '' || hardJilid.value < 0) {
            valid = false;
            document.getElementById('hard_jilid-error').textContent =
                'Jumlah Hard File tidak boleh kosong atau negatif.';
        }

        const softJilid = document.getElementById('soft_jilid');
        if (softJilid.value.trim() === '' || softJilid.value < 0) {
            valid = false;
            document.getElementById('soft_jilid-error').textContent =
                'Jumlah Soft File tidak boleh kosong atau negatif.';
        }

        const total = document.getElementById('total');
        if (total.value.trim() === '' || total.value < 0) {
            valid = false;
            document.getElementById('total-error').textContent = 'Total tidak boleh kosong atau negatif.';
        }

        const file = document.getElementById('file');
        if (file.value.trim() === '') {
            valid = false;
            document.getElementById('file-error').textContent = 'Link File Berkas tidak boleh kosong.';
        }

        const keterangan = document.getElementById('keterangan');
        if (keterangan.value.trim() === '') {
            valid = false;
            document.getElementById('keterangan-error').textContent = 'Keterangan tidak boleh kosong.';
        }

        const status = document.getElementById('status');
        if (status && status.value === '') {
            valid = false;
            document.getElementById('status-error').textContent = 'Status harus dipilih.';
        }

        // If not valid, prevent form submission
        if (!valid) {
            event.preventDefault();
        }
    });

    // Attach the calculation function to input change events
    document.getElementById("page_berwarna").addEventListener("input", updateCalculations);
    document.getElementById("page_hitamPutih").addEventListener("input", updateCalculations);
    document.getElementById("exemplar").addEventListener("input", updateCalculations);
    document.getElementById("hard_jilid").addEventListener("input", updateCalculations);
    document.getElementById("soft_jilid").addEventListener("input", updateCalculations);

    // Calculate initial values
    updateCalculations();
</script>
