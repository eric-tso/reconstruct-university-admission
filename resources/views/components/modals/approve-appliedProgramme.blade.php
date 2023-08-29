@props(['appliedProgramme'])

<div class="modal fade" id="approveAppliedProgrammeModal{{ $appliedProgramme->id }}" tabindex="-1" role="dialog" aria-labelledby="approveAppliedProgrammeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="approveAppliedProgrammeModalLabel">Precaution</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you confirm to APPROVE this applied programme?
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th scope="col">Applicant Lastet CGPA</th>
                    <th scope="col">Required CGPA of Applied Programme</th>
                </tr>
            </thead>
            <tbody>
                <td>{{ number_format($appliedProgramme->user->application->postCgpa, 2, '.', '') }}</td>
                @if($appliedProgramme->year == 1) 
                    <td>{{ number_format($appliedProgramme->programme->year1RequiredCgpa,2, '.', '') }}</td>
                @else
                    <td>{{ number_format($appliedProgramme->programme->year3RequiredCgpa,2, '.', '') }}</td>
                @endif
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600" data-dismiss="modal">Close</button>
        <form method="POST" action="appliedProgrammes/{{ $appliedProgramme->id }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Approved">

            <button class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-600">Approve</button>
        </form>
      </div>
    </div>
  </div>
</div>