<div class="modal-content">
    <form id="formAction" action="{{ $role->id ? route('roles.update', $role->id) : route('roles.store') }} "
        method="post">
        @csrf
        @if ($role->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Input Role" value="{{ $role->name }}" class="form-control"
                            id="name" name="name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="guard_name">Guard</label>
                        <input type="text" placeholder="Input Role" value="{{ $role->guard_name }}"
                            class="form-control" id="guard_name" name="guard_name">
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
