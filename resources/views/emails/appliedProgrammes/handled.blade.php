@component('mail::message')
# Your Applied Programme is {{ $appliedProgramme->status }}

Apply Programme: {{ $appliedProgramme->programme->name }}<br>
Apply Year: Year {{ $appliedProgramme->year }}<br>

@component('mail::button', ['url' => 'http://localhost:8000/appliedProgrammes'])
Let's Check
@endcomponent

Thanks,<br>
Hon University
@endcomponent