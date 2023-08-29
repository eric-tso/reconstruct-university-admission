@component('mail::message')
# Your Applied Programme's Interview is Arranged

Apply Programme: {{ $interview->appliedProgramme->programme->name }}<br>
Apply Year: Year {{ $interview->appliedProgramme->year }}<br>
Interview Date: {{ $interview->interviewPeriod->date }}<br>
Interview Time: {{ $interview->time }}<br>
Interview Venue: {{ $interview->interviewPeriod->venue }}<br>

@component('mail::button', ['url' => 'http://localhost:8000/appliedProgrammes'])
Let's Check
@endcomponent

Thanks,<br>
Hon University
@endcomponent
