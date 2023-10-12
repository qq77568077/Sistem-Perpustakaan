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
                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file">
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