<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programme;
use App\Models\InterviewPeriod;
use App\Models\Interview;
use App\Models\AppliedProgramme;

use App\Mail\InterviewArranged;
use Mail;

class InterviewPeriodController extends Controller
{   
    public function index()
    {
        return view('interviewPeriods.index', [ 'interviewPeriods' => InterviewPeriod::all() ]);
    }

    public function create()
    {
        return view('interviewPeriods.create', [ 'programmes' => Programme::all() ]);
    }

    public function store()
    {      
        $attributes = request()->validate([
            'programme_id' => ['required'],
            'date' => ['required', 'date', 'after:tomorrow'],
            'startTime' => ['required', 'date_format:H:i'],
            'finishTime' => ['required', 'date_format:H:i', 'after:startTime'],
            'timeSlot' => ['required', 'numeric', 'min:10'],
            'venue' => ['required', 'max:255'],
        ]);

        $attributes['timePeriod'] = $attributes['startTime'] . '-' . $attributes['finishTime'];

        $startTime = strtotime($attributes['startTime']);
        $finishTime = strtotime($attributes['finishTime']);
        $timeSlot = $attributes['timeSlot'] * 60;

        unset($attributes['startTime'],$attributes['finishTime']);
        $interviewPeriod = InterviewPeriod::create($attributes);

        while($startTime + $timeSlot <= $finishTime){
            $middleTime = $startTime + $timeSlot;
            $interview = Interview::create([
                'interview_period_id' => $interviewPeriod->id,
                'time' => date("H:i", $startTime) . '-' . date("H:i", $middleTime)
            ]);

            if ($appliedProgramme = AppliedProgramme::where('programme_id', $interviewPeriod->programme_id)->where('status','Approved')->where('autoAssigned', 'false')->first() ?? false){
                $interview->update([
                    'applied_programme_id' => $appliedProgramme->id,
                    'userAccepted' => 'Requesting'
                ]);
                $appliedProgramme->update(['autoAssigned' => "true"]);

                Mail::to($appliedProgramme->user)->send(new InterviewArranged($interview));
            }

            $startTime = $middleTime;
        }

        return redirect('/interviewPeriods')->with('success', 'Interview Period & Slot Created');
    }

    public function show(InterviewPeriod $interviewPeriod)
    {
        return view('interviewPeriods.show', [ 'interviews' => Interview::where('interview_period_id', $interviewPeriod->id)->get() ]);
    }
}

