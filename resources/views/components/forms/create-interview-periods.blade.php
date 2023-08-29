@props(['programmes'])

<form method="POST" action="/interviewPeriods">
    @csrf

    <x-form.field>
        <x-form.label name="programme"/>
            <select class="border border-gray-200 p-2 w-full rounded" name="programme_id">
                    <option value="" disable>--Select Your Option--</option>
                @foreach($programmes as $programme)
                    <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                @endforeach
            </select>
        <x-form.error name="programme_id" />
    </x-form.field>

    <x-form.input name="date" type="date" label="Date" :value="old('date')" />
    <x-form.input name="startTime" type="time" label="Start Time" :value="old('startTime')" />
    <x-form.input name="finishTime" type="time" label="Finish Time" :value="old('finishTime')" />
    <x-form.input name="timeSlot" type="number" min="0" label="Time Slot of Each Interview" :value="old('timeSlot')" />
    <x-form.input name="venue" label="Venue" :value="old('venue')" />
          
    
    <div class="d-flex justify-content-center">
        <x-form.button>Submit</x-form.button>
    </div>
</form>