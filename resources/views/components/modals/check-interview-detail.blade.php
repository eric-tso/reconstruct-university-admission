@props(['appliedProgramme'])

<div class="modal fade" id="checkInterviewDetailModal{{ $appliedProgramme->id }}" tabindex="-1" role="dialog" aria-labelledby="checkInterviewDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="checkInterviewDetailModalLabel">Interview Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="overflow-x-auto">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>