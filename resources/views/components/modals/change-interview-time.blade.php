@props(['appliedProgramme'])

<div class="modal fade" id="changeInterviewTimeModal{{ $appliedProgramme->id }}" tabindex="-1" role="dialog" aria-labelledby="changeInterviewTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="changeInterviewTimeModalLabel">Precaution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you confirm to send a changing interview time request?
                <strong>Attendion:<br>
                1. Every programme application only have ONE chance to send interview time request.<br>
                2. If interview time period of applied programme is not empty, new interview time may not be assigned.<br>
                </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600" data-dismiss="modal">Close</button>
                <form method="POST" action="appliedProgrammes/{{ $appliedProgramme->id }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="changingTime" value="true">

                    <button class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-600">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>