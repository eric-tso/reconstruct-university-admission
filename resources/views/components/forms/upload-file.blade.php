@props(['createFile'])

<form method="POST" action="/files" enctype="multipart/form-data">
  @csrf

  @if ($createFile ?? false)  
    <x-form.input name="name" label="File Name" value="Post-Secondary Transcript" readonly />
  @else
    <x-form.input name="name" label="File Name" :value="old('name')"/>
  @endif
  <x-form.input name="uploadFile" type="file" label="Upload File" />

  <div class="d-flex justify-content-center">
    <x-form.button>Upload</x-form.button>
  </div>
</form>
