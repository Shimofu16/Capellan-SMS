<div class="modal fade" id="edit{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Class Programm</h5>

            </div>
            @livewire('class-schedule.edit-schedule',['schedule' => $schedule], key($schedule->id))
        </div>
    </div>
</div>
