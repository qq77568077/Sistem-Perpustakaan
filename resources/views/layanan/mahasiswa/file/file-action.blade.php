<div class="modal-content">
    <form id="formAction" action="{{ $berka->id ? route('berkas.update', $berka->id) : route('berkas.store') }} "
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($berka->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Berkas TA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                            <option value="">Open this select menu</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $berka->kategori ? 'selected' : '' }}>
                                    {{ $category->kategori_ta }}
                                </option>
                            @endforeach
                        </select>
                        <span class="error-message text-danger" id="kategori-error"></span>
                    </div>
                    <div class="mb-3" id="jenis_file_1">
                        <label for="jenis_file_1">Jenis Pengembangan</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="jenis_file_1">
                                <option value="">Open this select menu</option>
                                @foreach ($documents as $document)
                                    <option value="{{ $document->id }}"
                                        {{ $document->id == $berka->jenis_file ? 'selected' : '' }}>
                                        {{ $document->dokumen }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error-message text-danger" id="jenis_file_1-error"></span>
                        </div>
                    </div>
                    <div class="mb-3" id="jenis_file_2">
                        <label for="jenis_file2">Jenis Non Pengembangan</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="jenis_file"
                                name="jenis_file_2">
                                <option value="">Open this select menu</option>
                                <option value="1" {{ '1' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '1' ? 'yellow' : 'white' }}">
                                    Laporan TA</option>
                                <option value="2" {{ '2' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '2' ? 'yellow' : 'white' }}">
                                    Dokumen Penunjang Penelitian</option>
                                <option value="3" {{ '3' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '3' ? 'yellow' : 'white' }}">File
                                    Presentasi</option>
                                <option value="6" {{ '6' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '6' ? 'yellow' : 'white' }}">
                                    Video Trailer</option>
                                <option value="7" {{ '7' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '7' ? 'yellow' : 'white' }}">
                                    Poster Tugas Akhir</option>
                                <option value="8" {{ '8' == $berka->jenis_file ? 'selected' : '' }}
                                    style="background-color: {{ $berka->jenis_file == '8' ? 'yellow' : 'white' }}">
                                    Artikel Jurnal</option>
                            </select>
                            <span class="error-message text-danger" id="jenis_file_2-error"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_file">Bukti FIle</label>
                        <input type="text" class="form-control" value="{{ $berka->bukti_file }}" id="bukti_file"
                            name="bukti_file">
                        <span class="error-message text-danger" id="bukti_file-error"></span>
                    </div>
                    @if (request()->user()->can('status layanan/berkas'))
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name='keterangan'>{{ $berka->keterangan }}</textarea>
                        </div>
                        <div class="mb-3" {{ $berka->id ? 'edit-mode' : '' }}>
                            <label for="hasil_cek">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Open this select menu</option>
                                @php
                                    $array = ['Validasi', 'Belum Validasi'];
                                @endphp
                                @foreach ($array as $element)
                                    <option value="{{ $element }}"
                                        {{ $element === $berka->status ? 'selected' : '' }}>
                                        {{ $element }}
                                    </option>
                                @endforeach
                            </select>
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
    // Function to handle changes in the kategori dropdown
    function handleKategoriChange() {
        var selectedValue = document.getElementById('kategori').value;

        // Hide all jenis_file divs by default
        document.getElementById('jenis_file_1').style.display = 'none';
        document.getElementById('jenis_file_2').style.display = 'none';

        // Show the relevant jenis_file div based on the selected category
        if (selectedValue === '1') {
            document.getElementById('jenis_file_1').style.display = 'block';
        } else if (selectedValue === '2') {
            document.getElementById('jenis_file_2').style.display = 'block';
        }
    }

    // Add event listener to the kategori dropdown
    document.getElementById('kategori').addEventListener('change', function() {
        handleKategoriChange();
    });

    // Function to handle changes in the jenis file dropdown
    function handleJenisFileChange() {
        var selectedValue = document.getElementById('jenis_file_1').value;

        // Get all options within the jenis file dropdown
        var options = document.getElementById('jenis_file_1').options;

        // Loop through the options to set their style based on selection
        for (var i = 0; i < options.length; i++) {
            if (options[i].value === selectedValue) {
                // Set the background color for the selected option
                options[i].style.backgroundColor = 'yellow';
            } else {
                // Reset the background color for other options
                options[i].style.backgroundColor = 'white';
            }
        }
    }

    // Add event listener to the jenis file dropdown
    function handleJenisFileChange() {
        var selectedValue;
        var jenisFileDropdown;

        var selectedKategori = document.getElementById('kategori').value;

        // Determine which jenis file dropdown to use based on the selected category
        if (selectedKategori === '1') {
            jenisFileDropdown = document.getElementById('jenis_file_1');
        } else if (selectedKategori === '2') {
            jenisFileDropdown = document.getElementById('jenis_file_2');
        }

        // Get the selected value from the jenis file dropdown
        selectedValue = jenisFileDropdown.value;

        // Get all options within the jenis file dropdown
        var options = jenisFileDropdown.options;

        // Loop through the options to set their style based on selection
        for (var i = 0; i < options.length; i++) {
            if (options[i].value === selectedValue) {
                // Set the background color for the selected option
                options[i].style.backgroundColor = 'yellow';
            } else {
                // Reset the background color for other options
                options[i].style.backgroundColor = 'white';
            }
        }
    }


    handleJenisFileChange();
    handleKategoriChange();


    // Form validation
    document.getElementById('formAction').addEventListener('submit', function(event) {
        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function(element) {
            element.textContent = '';
        });

        // Validation logic for each input field
        const kategori = document.getElementById('kategori');
        if (kategori.value === '') {
            valid = false;
            document.getElementById('kategori-error').textContent = 'Kategori harus dipilih.';
        }

        const jenisFile1 = document.getElementById('jenis_file_1').querySelector('select');
        const jenisFile2 = document.getElementById('jenis_file_2').querySelector('select');
        if (kategori.value === '1' && jenisFile1.value === '') {
            valid = false;
            document.getElementById('jenis_file_1-error').textContent = 'Jenis Pengembangan harus dipilih.';
        } else if (kategori.value === '2' && jenisFile2.value === '') {
            valid = false;
            document.getElementById('jenis_file_2-error').textContent = 'Jenis Non Pengembangan harus dipilih.';
        }

        const buktiFile = document.getElementById('bukti_file');
        if (buktiFile.value.trim() === '') {
            valid = false;
            document.getElementById('bukti_file-error').textContent = 'Bukti File tidak boleh kosong.';
        }

        const keterangan = document.getElementById('keterangan');
        if (keterangan && keterangan.value.trim() === '') {
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
</script>
