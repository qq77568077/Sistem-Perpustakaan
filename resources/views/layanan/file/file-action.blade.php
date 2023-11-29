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
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="{{$berka->nama}}" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" value="{{$berka->nrp}}" id="nrp" name="nrp">
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ $berka->judul }}" id="judul"
                            name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="laporan_ta">File Laporan TA</label>
                        <input type="text" class="form-control" value="{{ $berka->laporan_ta }}" id="laporan_ta"
                            name="laporan_ta">
                    </div>
                    <div class="mb-3">
                        <label for="dokumen_penunjang">File Dokumen Penunjang</label>
                        <input type="text" class="form-control" value="{{ $berka->dokumen_penunjang }}" id="dokumen_penunjang"
                            name="dokumen_penunjang">
                    </div>
                    <div class="mb-3">
                        <label for="file_presentasi">File Presentasi</label>
                        <input type="text" class="form-control" value="{{ $berka->file_presentasi }}" id="file_presentasi"
                            name="file_presentasi">
                    </div>
                    <div class="mb-3">
                        <label for="product">File Product</label>
                        <input type="text" class="form-control" value="{{ $berka->product }}" id="product"
                            name="product">
                    </div>
                    <div class="mb-3">
                        <label for="haki">Bukti Haki</label>
                        <input type="text" class="form-control" value="{{ $berka->haki }}" id="haki"
                            name="haki">
                    </div>
                    <div class="mb-3">
                        <label for="video_trailer">File Video Trailer</label>
                        <input type="text" class="form-control" value="{{ $berka->video_trailer }}" id="video_trailer"
                            name="video_trailer">
                    </div>
                    <div class="mb-3">
                        <label for="poster">File Poster</label>
                        <input type="text" class="form-control" value="{{ $berka->poster }}" id="poster"
                            name="poster">
                    </div>
                    <div class="mb-3">
                        <label for="artikel_jurnal">File Artikel Jurnal</label>
                        <input type="text" class="form-control" value="{{ $berka->artikel_jurnal }}" id="artikel_jurnal"
                            name="artikel_jurnal">
                    </div>
                    @if (request()->user()->can('status layanan/berkas'))
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name='keterangan'>{{$berka->keterangan}}</textarea>
                      </div>
                    <div class="mb-3" {{$berka->id ? 'edit-mode' : ''}}>
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
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
