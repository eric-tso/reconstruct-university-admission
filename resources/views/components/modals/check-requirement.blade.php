@props(['appliedProgramme'])

@php
    $postSecondaryTranscript = $appliedProgramme->user->file->where('name', 'Post-Secondary Transcript')->first();
@endphp

<div class="modal fade" id="checkRequirementModal{{ $appliedProgramme->id }}" tabindex="-1" role="dialog" aria-labelledby="checkRequirementModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="checkRequirementModalLabel">Check Requirement (Application No.: A{{ $appliedProgramme->user->application->id }}-R{{ $appliedProgramme->rank }})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Applicant Uploaded Document: <br>
        <li>Post-Secondary Transcript: <a href="/document?path={{ $postSecondaryTranscript->path }}&originalName={{ $postSecondaryTranscript->originalName }}" style="color:blue">{{ $postSecondaryTranscript->originalName }}</a> </li>
        <li>Other Document: <a href="/files/{{ $appliedProgramme->user_id }}" style="color:blue">View More..</a></li><br>

        Comparision:
        <table class="table table-bordered">
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
      </div>
    </div>
  </div>
</div>