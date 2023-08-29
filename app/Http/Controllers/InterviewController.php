<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Interview;
use App\Models\AppliedProgramme;
use App\Models\InterviewPeriod;

use DB;

use App\Mail\InterviewArranged;
use Mail;


class InterviewController extends Controller
{   
    public function edit(Interview $interview)
    {   
        //ddd(InterviewPeriod::where('programme_id', $interview->appliedProgramme->programme_id)->get());
        return view('interviews.edit', [
            'interview' => $interview,
            'emptyDates' => InterviewPeriod::where('programme_id', $interview->appliedProgramme->programme_id)->get(),
        ]);
    }
    
    public function update(Interview $interview)
    {   
        if(request()->userAccepted ?? false){
            $attributes = request()->validate([
                'userAccepted' => ['required', Rule::in(['Accepted', 'Rejected'])]
            ]);

            if($attributes['userAccepted'] == 'Accepted'){
                $interview->update($attributes);
            }else{
                $interview->update([
                    'applied_programme_id' => NULL,
                    'userAccepted' => NULL
                ]);

                if ($appliedProgramme = AppliedProgramme::where('programme_id', $interview->interviewPeriod->programme_id)->where('status','Approved')->where('autoAssigned', 'false')->first() ?? false){
                    $interview->update([
                        'applied_programme_id' => $appliedProgramme->id,
                        'userAccepted' => 'Requesting'
                    ]);
                    $appliedProgramme->update(['autoAssigned' => "true"]);

                    Mail::to($appliedProgramme->user)->send(new InterviewArranged($interview));
                }
            }

            return back()->with('success', 'Interview is ' . $attributes['userAccepted'] . '!');
        }

        if(request()->noEmpty ?? false){
            AppliedProgramme::find($interview->applied_programme_id)->update([
                'autoAssigned' => 'true'
            ]);
            
            return redirect('/changingTimeRequest')->with('success', 'Requested is Handeled!');
        }

        $attributes = request()->validate([
            'newInterviewDate' => ['required'],
            'newInterviewTime' => ['required']
        ]);

        Interview::find($attributes['newInterviewTime'])->update([
            'applied_programme_id' => $interview->applied_programme_id,
            'userAccepted' => 'Requesting'
        ]);

        AppliedProgramme::find($interview->applied_programme_id)->update([
            'autoAssigned' => 'true'
        ]);

        Mail::to($interview->appliedProgramme->user)->send(new InterviewArranged($interview));

        $interview->update([
            'applied_programme_id' => NULL,
            'userAccepted' => NULL
        ]);

        return redirect('/changingTimeRequest')->with('success', 'Requested is Handeled!');

    }

    public function getEmptyTime($timePeriodId=0){

        $empData['data'] = DB::select('select i.id, i.time from interviews as i 
        LEFT JOIN interview_periods AS ip ON ip.id = i.interview_period_id 
        WHERE i.applied_programme_id IS NULL and ip.id =' . $timePeriodId);
        
        if($empData['data']==null){
            $empData['data'][0]['id'] = null;
        }

        return response()->json($empData);
     
    }
}
