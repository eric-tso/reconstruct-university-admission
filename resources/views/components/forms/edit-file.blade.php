@props(['file'])

<form method="POST" action="/files/{{ $file->id }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  @if ($file->name == "Post-Secondary Transcript")
    <x-form.input name="name" label="File Name" value="Post-Secondary Transcript" readonly />
  @else
    <x-form.input name="name" label="File Name" :value="old('name', $file->name)" /> 
  @endif

  <strong class="block mb-2 uppercase font-bold text-xs text-gray-700">Uploaded File:
    <a href="/document?path={{ $file->path }}&originalName={{ $file->originalName }}">
      {{ $file->originalName }}
    </a>
  </strong>

  <x-form.input name="uploadFile" type="file" label="Upload File" />
  
  <div class="d-flex justify-content-center">
    <x-form.button>Upload</x-form.button>
  </div>
</form>
