<form method="POST" action="/programmes">
    @csrf

    <x-form.field>
        <x-form.label name="category" label="Category" />
            <select name="category" id="category" class="border border-gray-200 p-2 w-full rounded">
                <option value="" disable>--Select Your Option--</option>
                <option value="Arts" {{ old('category') == "Arts" ? 'selected' : '' }}>Arts</option>
                <option value="Business" {{ old('category') == "Business" ? 'selected' : '' }}>Business</option>
                <option value="Science" {{ old('category') == "Science" ? 'selected' : '' }}>Science</option>
            </select>
        <x-form.error name="category" />
    </x-form.field>
    
    <x-form.input name="name" label="Name" :value="old('name')" />
    <x-form.input name="year1RequiredCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" label="Year1 Required CGPA" />
    <x-form.input name="year3RequiredCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" label="Year3 Required CGPA" />
  
    <div class="d-flex justify-content-center">
        <x-form.button>Create</x-form.button>
    </div>
</form>