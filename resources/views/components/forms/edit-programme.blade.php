@props(['programme'])

<form method="POST" action="/programmes/{{ $programme->id }}">
  @csrf
  @method('PATCH')

  <x-form.field>
    <x-form.label name="category" />
      <select name="category" id="category" class="border border-gray-200 p-2 w-full rounded">
        <x-form.option value="Arts" name="category" :application="$programme">Arts</x-form.option>
        <x-form.option value="Business" name="category" :application="$programme">Business</x-form.option>
        <x-form.option value="Science" name="category" :application="$programme">Science</x-form.option>
      </select>
    <x-form.error name="category" />
  </x-form.field>
  
  <x-form.input name="name" label="Name" :value="old('name', $programme->name)" />
  <x-form.input name="year1RequiredCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" label="Year1 Required CGPA" :value="old('year1RequiredCgpa', $programme->year1RequiredCgpa)" />
  <x-form.input name="year3RequiredCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" label="Year3 Required CGPA" :value="old('year3RequiredCgpa', $programme->year3RequiredCgpa)" />

  <div class="d-flex justify-content-center">
    <x-form.button>Update</x-form.button>
  </div>
</form>