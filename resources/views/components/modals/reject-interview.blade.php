@props(['appliedProgramme'])

<div class="modal fade" id="rejectInterviewModal{{ $appliedProgramme->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="rejectInterviewModalLabel">Precaution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you confirm to REJECT this interview?
                <h2 class="mt-4">Interview Detail:</h2>
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Venue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $appliedProgramme->interview->interviewPeriod->date }}</td>
                        <td>{{ $appliedProgramme->interview->time }}</td>
                        <td>{{ $appliedProgramme->interview->interviewPeriod->venue }}</td>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600" data-dismiss="modal">Close</button>
                <form method="POST" action="interviews/{{ $appliedProgramme->interview->id }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="userAccepted" value="Rejected">

                    <button type="submit" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>