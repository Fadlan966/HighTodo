<!-- Modal Delete-->
<div class="modal fade" id="ModalTaskDestroy{{ $item->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
             <div class="modal-body text-left">

                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Name</div>
                    <div class="col-7">: {{ $item->user->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Email</div>
                    <div class="col-7">: <span class="badge badge-primary">{{ $item->user->email }}</span></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Role</div>
                    <div class="col-7">:
                            <span class="badge badge-info">
                                {{ $item->user->role }}
                            </span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Cancel
                </button>
                <form action="{{ route('taskDestroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show-->
<div class="modal fade" id="ModalTaskShow{{ $item->id }}" tabindex="-1"
    aria-labelledby="ShowModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Detail Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">

                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Name</div>
                    <div class="col-7">: {{ $item->user->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Email</div>
                    <div class="col-7">: <span class="badge badge-primary">{{ $item->user->email }}</span></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Role</div>
                    <div class="col-7">:
                            <span class="badge badge-info">
                                {{ $item->user->role }}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
