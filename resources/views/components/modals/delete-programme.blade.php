@props(['programme'])

<div class="modal fade" id="deleteModal{{ $programme->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="deleteModalLabel">Precaution</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you confirm deleting this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600" data-dismiss="modal">Close</button>
        <form method="POST" action="programmes/{{ $programme->id }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>