<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
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
                <p class="mb-3">Are you sure you want to delete this user?</p>

                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Name</div>
                    <div class="col-7">: {{ $item->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Email</div>
                    <div class="col-7">: <span class="badge badge-primary">{{ $item->email }}</span></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 font-weight-bold">Role</div>
                    <div class="col-7">:
                        @if (strtolower($item->role) == 'admin')
                            <span class="badge badge-dark">
                                {{ $item->role }}
                            </span>
                        @else
                            <span class="badge badge-info">
                                {{ $item->role }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 font-weight-bold">Task Status</div>
                    <div class="col-7">:
                        @if ($item->is_tasks == false)
                            <span class="badge badge-danger">Unassigned</span>
                        @else
                            <span class="badge badge-success">Assigned</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Cancel
                </button>
                <form action="{{ route('userDestroy', $item->id) }}" method="post">
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
