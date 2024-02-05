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
                                <option value="{{ $category->id }}" {{ $category->id == $berka->kategori ? 'selected' : '' }}>
                                    {{ $category->kategori_ta }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="jenis_file_1">
                        <label for="jenis_file">Jenis Pengembangan</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example"  name="jenis_file_1">
                                <option value="">Open this select menu</option>
                                @foreach ($documents as $document)
                                    <option value="{{ $document->id }}" {{ $document->id == $berka->jenis_file ? 'selected' : '' }}>
                                        {{ $document->dokumen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" id="jenis_file_2">
                        <label for="jenis_file">Jenis Non Pengembangan</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="jenis_file" name="jenis_file_2">
                                <option value="">Open this select menu</option>
                                <option value="1" {{ "1" == $berka->jenis_file ? 'selected' : ''}}>Laporan TA</option>
                                <option value="2" {{ "2" == $berka->jenis_file ? 'selected' : ''}}>Dokumen Penunjang Penelitian</option>
                                <option value="3" {{ "3" == $berka->jenis_file ? 'selected' : ''}}>File Presentasi</option>
                                <option value="6" {{ "6" == $berka->jenis_file ? 'selected' : ''}}>Video Trailer</option>
                                <option value="7" {{ "7" == $berka->jenis_file ? 'selected' : ''}}>Poster Tugas Akhir</option>
                                <option value="8" {{ "8" == $berka->jenis_file ? 'selected' : ''}}>Artikel Jurnal</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_file">Bukti FIle</label>
                        <input type="text" class="form-control" value="{{ $berka->bukti_file }}" id="bukti_file"
                            name="bukti_file">
                    </div>
                    @if (request()->user()->can('status layanan/berkas'))
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name='keterangan'>{{$berka->keterangan}}</textarea>
                      </div>
                    <div class="mb-3" {{$berka->id ? 'edit-mode' : ''}}>
                        <label for="hasil_cek">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Open this select menu</option>
                            @php
                                $array = ['Validasi', 'Belum Validasi'];
                            @endphp
                            @foreach ($array as $element)
                                <option value="{{ $element }}" {{ $element === $berka->status ? 'selected' : '' }}>
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
    document.getElementById('kategori').addEventListener('change', function () {
        var selectedValue = this.value;

        // Hide all jenis_file divs
        document.getElementById('jenis_file_1').style.display = 'none';
        document.getElementById('jenis_file_2').style.display = 'none';

        // Show the relevant jenis_file div based on the selected category
        if (selectedValue === '1') {
            console.log("Selected Value: " + selectedValue);
            document.getElementById('jenis_file_1').style.display = 'block';
        } else if (selectedValue === '2') {
            console.log("Selected Value: " + selectedValue);
            document.getElementById('jenis_file_2').style.display = 'block';
        }
    });
</script>