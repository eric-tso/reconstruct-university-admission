@props(['application'])

<form method="POST" action="/applications/{{ $application->id }}">
    @csrf
    @method('PATCH')

    <input type="hidden" name="formName" value="Personal Particular">
    <input type="hidden" name="personalFilled" value="true">

    <!-- Personal Information -->
    <div class="bg-blue-400 text-center rounded mb-3">Personal Information</div>
    <x-form.input name="englishName" label="English Name" :value="old('englishName', $application->englishName)" required="required"/>
    <x-form.input name="chineseName" label="Chinese Name" :value="old('chineseName', $application->chineseName)" />

    <x-form.field>
        <x-form.label name="sex" required="required"/>

        <select name="sex" id="sex" class="border border-gray-200 p-2 w-full rounded">
            <x-form.option value="male" name="sex" :application="$application">Male</x-form.option>
            <x-form.option value="female" name="sex" :application="$application">Female</x-form.option>
        </select>

        <x-form.error name="sex" />
    </x-form.field>

    <x-form.input name="dateOfBirth" type="date" label="Date Of Birth" :value="old('dateOfBirth', $application->dateOfBirth)" required="required"/>
    <x-form.input name="nationality" label="Nationality" :value="old('nationality', $application->nationality)" required="required"/>

    <!-- Contact -->
    <div class="bg-blue-400 text-center rounded mb-3">Contact</div>
    <x-form.input name="homephoneNumber" label="Homephone Number" :value="old('homephoneNumber', $application->homephoneNumber)" required="required"/>
    <x-form.input name="mobileNumber" label="Mobile Number" :value="old('mobileNumber', $application->mobileNumber)" required="required"/>
    <x-form.input name="mailingAddress" label="Mailing Address" :value="old('mailingAddress', $application->mailingAddress)" required="required"/>

    <x-form.button>Save</x-form.button>
</form>