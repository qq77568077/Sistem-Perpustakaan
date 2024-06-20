<div class="modal-content">
    <form id="formAction"
        action="{{ $pengajuan_plagiarism->id ? route('pengajuan-plagiarism.update', $pengajuan_plagiarism->id) : route('pengajuan-plagiarism.store') }} "
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($pengajuan_plagiarism->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Plagiarism</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="file">FIle</label>
                        <input type="text" class="form-control" value="{{ $pengajuan_plagiarism->file }}"
                            id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="hasil_cek">Hasil Cek</label>
                        <input type="text" class="form-control" value="{{ $pengajuan_plagiarism->hasil_cek }}"
                            id="hasil_cek" name="hasil_cek">
                    </div>
                    @if (request()->user()->can('status layanan/pengajuan-plagiarism'))
                        <div class="mb-3">
                            <label for="similarity">Nilai Similarity</label>
                            <input type="text" class="form-control" value="{{ $pengajuan_plagiarism->similarity }}"
                                id="similarity" name="similarity">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name='keterangan'>{{ $pengajuan_plagiarism->keterangan }}</textarea>
                        </div>
                        <div class="mb-3" {{ $pengajuan_plagiarism->id ? 'edit-mode' : '' }}>
                            <label for="hasil_cek">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Open this select menu</option>
                                @php
                                    $array = ['Selesai', 'Belum Mencukupi', 'File Tidak Bisa Dibuka'];
                                @endphp
                                @foreach ($array as $element)
                                    <option value="{{ $element }}"
                                        {{ $element === $pengajuan_plagiarism->status ? 'selected' : '' }}>
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
