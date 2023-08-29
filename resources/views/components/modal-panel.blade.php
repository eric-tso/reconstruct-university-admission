@props(['header', 'modal'])

<div class="modal fade" id="{{ $modal }}" tabindex="-1" role="dialog" aria-labelledby="edit-postSecondaryTranscriptTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title uppercase text-xl font-medium text-gray-900 dark:text-white">{{ $header }}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-2 px-2">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</div>