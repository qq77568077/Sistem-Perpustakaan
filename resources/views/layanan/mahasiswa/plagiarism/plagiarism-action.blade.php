<div class="modal-content">
    <form id="formAction" action="{{$plagiarism->id ? route('plagiarism.update' , $plagiarism->id ) : route('plagiarism.store')}} " method="post" enctype="multipart/form-data">
        @csrf
        @if($plagiarism->id)
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
                        <label for="file">Nama</label>
                        <input type="text" class="form-control" value="{{$plagiarism->nama}}" id="nama" name="nama" {{$plagiarism->id ? 'readonly' : ''}}>
                    </div>
                    <div class="mb-3">
                        <label for="file">NRP</label>
                        <input type="text" class="form-control" value="{{$plagiarism->nrp}}" id="nrp" name="nrp" {{$plagiarism->id ? 'readonly' : ''}}>
                    </div>
                    <div class="mb-3">
                        <label for="file">File</label>
                        <input type="text" class="form-control" value="{{$plagiarism->file}}" id="file" name="file" {{$plagiarism->id ? 'readonly' : ''}}>
                    </div>
                    @if (request()->user()->can('hasil layanan/plagiarism'))
                    <div class="mb-3" {{$plagiarism->id ? 'edit-mode' : ''}}>
                        <label for="hasil_cek">Hasil Cek</label>
                        <input type="text" class="form-control" value="{{$plagiarism->hasil_cek}}" id="hasil_cek" name="hasil_cek">
                    </div>
                    @endif
                    @if (request()->user()->can('keterangan layanan/plagiarism'))
                    <div class="mb-3" {{$plagiarism->id ? 'edit-mode' : ''}}>
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" value="{{$plagiarism->keterangan}}" id="keterangan" name="keterangan">
                    </div>
                    @endif
                    @if (request()->user()->can('status layanan/plagiarism'))
                    <div class="mb-3" {{$plagiarism->id ? 'edit-mode' : ''}}>
                        <label for="hasil_cek">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected>Open this select menu</option>
                            @php
                                $array = ["Validasi", "Belum Validasi"];
                            @endphp
                            @foreach($array as $element)
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