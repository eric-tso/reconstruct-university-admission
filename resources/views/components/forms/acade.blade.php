@props(['application'])

<form method="POST" action="/applications/{{ $application->id }}">
    @csrf
    @method('PATCH')

    <input type="hidden" name="formName" value="Academic Profile">
    <input type="hidden" name="acadeFilled" value="true">

    <!-- Secondary School -->
    <div class="bg-blue-400 text-center rounded mb-3">Secondary School</div>
    <x-form.input name="secondaryCountry" label="Country/Region" :value="old('secondaryCountry', $application->secondaryCountry)" />
    <x-form.input name="secondarySchool" label="Name of School" :value="old('secondarySchool', $application->secondarySchool)" />
    <x-form.input name="secondaryAdmission" type="date" label="Date of Admission" :value="old('secondaryAdmission', $application->secondaryAdmission)" />
    <x-form.input name="secondaryCompletion" type="date" label="Date/Expected Date of Completion" :value="old('secondaryCompletion', $application->secondaryCompletion)" />

    <!-- Post-Secondary School -->
    <div class="bg-blue-400 text-center rounded mb-3">Post-Secondary School</div>
    <x-form.input name="postCountry" label="Country/Region" :value="old('postCountry', $application->postCountry)" />
    <x-form.input name="postSchool" label="Name of School" :value="old('postSchool', $application->postSchool)" />
    <x-form.input name="postProgramme" label="Studying Programme" :value="old('postProgramme', $application->postProgramme)" />

    <x-form.field>
        <x-form.label name="postQualification" label="Qualidication of Programme" />

        <select name="postQualification" id="postQualification" class="border border-gray-200 p-2 w-full rounded">
            <x-form.option value="hd" name="postQualification" :application="$application">Higher Diploma</x-form.option>
            <x-form.option value="asso" name="postQualification" :application="$application">Associate Degree</x-form.option>
            <x-form.option value="degree" name="postQualification" :application="$application">Degree</x-form.option>
        </select>

        <x-form.error name="postQualification" />
    </x-form.field>

    <x-form.field>
        <x-form.label name="postMode" label="Studying Mode of Programme" />

        <select name="postMode" id="postMode" class="border border-gray-200 p-2 w-full rounded">
            <x-form.option value="fullTime" name="postMode" :application="$application">Full-time</x-form.option>
            <x-form.option value="partTime" name="postMode" :application="$application">Part-time</x-form.option>
        </select>

        <x-form.error name="postMode" />
    </x-form.field>
        
    <x-form.input name="postCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" label="Latest Cumulative CGPA" :value="old('postCgpa', $application->postCgpa)">
        &nbsp out of maximum CGPA &nbsp
        <input name="postMaxCgpa" type="number" step="0.01" min="0" class="border border-gray-200 p-2 w-2/12 rounded" name="postMaxCgpa" value="{{ old('postMaxCgpa', $application->postMaxCgpa) }}">
    </x-form.input>

    <x-form.input name="postAdmission" type="date" label="Date of Admission" :value="old('postAdmission', $application->postAdmission)" />
    <x-form.input name="postCompletion" type="date" label="Date/Expected Date of Completion" :value="old('postCompletion', $application->postCompletion)" />

    <x-form.button>Save</x-form.button>
</form>