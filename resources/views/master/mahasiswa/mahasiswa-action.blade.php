<div class="modal-content">
    <form id="formAction"
        action="{{ $mahasiswa->id ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }} "
        method="post">
        @csrf
        @if ($mahasiswa->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" placeholder="Input Nama" value="{{ $mahasiswa->nama }}"
                            class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nrp">NRP</label>
                        <input type="text" placeholder="Input NRP" value="{{ $mahasiswa->nrp }}"
                            class="form-control" id="nrp" name="nrp">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Input Email" value="{{ $mahasiswa->email }}"
                            class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>
                    <div class="mb-3" id="prodi_id">
                        <label for="prodi_id">Prodi</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="prodi_id">
                                <option value="">Open this select Prodi</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}"
                                        {{ $prodi->id == $mahasiswa->prodi_id ? 'selected' : '' }}>
                                        {{ $prodi->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Role</button>
        </div>
    </form>
</div>
