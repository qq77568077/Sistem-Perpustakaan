<div class="modal-content">
    <form id="formAction"
        action="{{ $plagiarism->id ? route('plagiarism.update', $plagiarism->id) : route('plagiarism.store') }} "
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($plagiarism->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Cek Plagiarism</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="file">File</label>
                        <input type="text" class="form-control" value="{{ $plagiarism->file }}" id="file"
                            name="file" {{ $plagiarism->id ? 'edit-mode' : '' }}>
                        <span class="error-message text-danger" id="file-error"></span>
                    </div>
                    @if (request()->user()->can('hasil layanan/plagiarism'))
                        <div class="mb-3" {{ $plagiarism->id ? 'edit-mode' : '' }}>
                            <label for="hasil_cek">Hasil Cek</label>
                            <input type="text" class="form-control" value="{{ $plagiarism->hasil_cek }}"
                                id="hasil_cek" name="hasil_cek">
                        </div>
                    @endif
                    @if (request()->user()->can('keterangan layanan/plagiarism'))
                        <div class="mb-3" {{ $plagiarism->id ? 'edit-mode' : '' }}>
                            <label for="keterangan">keterangan</label>
                            <input type="text" class="form-control" value="{{ $plagiarism->keterangan }}"
                                id="keterangan" name="keterangan">
                        </div>
                    @endif
                    @if (request()->user()->can('status layanan/plagiarism'))
                        <div class="mb-3" {{ $plagiarism->id ? 'edit-mode' : '' }}>
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
                    @endif
                    <div class="mb-3" id="current-date">
                    </div>
                    <div class="mb-3" id="current-time">
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

    document.getElementById('formAction').addEventListener('submit', function(event) {
        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function(element) {
            element.textContent = '';
        });

        // File validation
        const file = document.getElementById('file');
        if (file.value.trim() === '') {
            valid = false;
            document.getElementById('file-error').textContent = 'File tidak boleh kosong.';
        }

        // Hasil cek validation
        const hasilCek = document.getElementById('hasil_cek');
        if (hasilCek && hasilCek.value.trim() === '') {
            valid = false;
            document.getElementById('hasil_cek-error').textContent = 'Hasil cek tidak boleh kosong.';
        }

        // Keterangan validation
        const keterangan = document.getElementById('keterangan');
        if (keterangan && keterangan.value.trim() === '') {
            valid = false;
            document.getElementById('keterangan-error').textContent = 'Keterangan tidak boleh kosong.';
        }

        // Status validation
        const status = document.getElementById('status');
        if (status.value === '') {
            valid = false;
            document.getElementById('status-error').textContent = 'Status harus dipilih.';
        }

        // If not valid, prevent form submission
        if (!valid) {
            event.preventDefault();
        }
    });
</script>
