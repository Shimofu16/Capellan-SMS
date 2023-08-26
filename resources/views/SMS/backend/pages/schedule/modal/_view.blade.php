<div class="modal fade" id="view{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">View Class {{ $schedule->name }}</h5>

            </div>
                <div class="modal-body">
                    <img src="{{ asset($schedule->image_url) }}" alt="{{ $schedule->name }}" style="height: 100%; width: 100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
        </div>
    </div>
</div>
