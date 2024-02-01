<div class="modal-content">
    <form id="formAction" action="{{ $pengajuan_jilid->id ? route('file.update', $pengajuan_jilid->id) : route('file.store') }} "
        method="post" enctype="multipart/form-data">
        @csrf
        @if ($pengajuan_jilid->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Jilid Berkas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="jenis_pengumpulan">Jenis Pengumpulan</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_pengumpulan" name="jenis_pengumpulan">
                            <option value="">Open this select menu</option>
                            @foreach ($pengumpulan as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $pengajuan_jilid->jenis_pengumpulan ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ $pengajuan_jilid->judul }}" id="judul"
                            name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="page_berwarna">Jumlah Halaman Berwarna</label>
                        <input type="number" class="form-control" value="{{ $pengajuan_jilid->page_berwarna }}"
                            id="page_berwarna" name="page_berwarna">
                    </div>
                    <div class="mb-3">
                        <label for="page_hitamPutih">Jumlah Halaman Hitam/Putih</label>
                        <input type="number" class="form-control" value="{{ $pengajuan_jilid->page_hitamPutih }}"
                            id="page_hitamPutih" name="page_hitamPutih">
                    </div>
                    <div class="mb-3">
                        <label for="exemplar">Jumlah Examplar</label>
                        <input type="number" class="form-control" value="{{ $pengajuan_jilid->exemplar }}" id="exemplar"
                            name="exemplar">
                    </div>
                    <div class="mb-3">
                        <label for="cover">Jumlah Cover</label>
                        <input type="number" class="form-control" value="{{ $pengajuan_jilid->cover }}" id="cover"
                            name="cover">
                    </div>
                    <div class="mb-3">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" value="{{ $pengajuan_jilid->total }}" id="total"
                            name="total">
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $pengajuan_jilid->bukti_pembayaran }}"
                            id="bukti_pembayaran" name="bukti_pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="file">Link File Berkas</label>
                        <input type="text" class="form-control" value="{{ $pengajuan_jilid->file }}" id="file"
                            name="file">
                    </div>
                    @if (request()->user()->can('status layanan/pengajuan-jilid'))
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name='keterangan'>{{$pengajuan_jilid->keterangan}}</textarea>
                      </div>
                    <div class="mb-3" {{$pengajuan_jilid->id ? 'edit-mode' : ''}}>
                        <label for="hasil_cek">Status</label>
                        <select class="form-select" name="status">
                            <option selected>Open this select menu</option>
                            @php
                                $array = ['Approved', 'selesai','Tidak Valid'];
                                $selectedStatus = isset($pengajuan_jilid[0]['status']) ? $pengajuan_jilid[0]['status'] : null;
                            @endphp
                            @foreach($array as $element)
                                @if ($element === $selectedStatus)
                                    <option value="{{ $element }}" selected>{{ $element }}</option>
                                @else
                                    <option value="{{ $element }}">{{ $element }}</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- <select class="form-select" name="status">
                            <option value="Validasi" {{ $pengajuan_jilid->status === 'Validasi' ? 'selected' : '' }}>Validasi</option>
                            <option value="Belum Validasi" {{ $pengajuan_jilid->status === 'Belum Validasi' ? 'selected' : '' }}>Belum Validasi</option>
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
