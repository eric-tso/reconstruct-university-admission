<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\AppliedProgramme;
use App\Models\File;
use App\Models\Interview;
use App\Models\InterviewPeriod;

use App\Mail\InterviewArranged;
use App\Mail\AppliedProgrammeHandled;
use Mail;

class OfficerAppliedProgrammeController extends Controller
{
    public function index()
    {   
        $appliedProgrammes = AppliedProgramme::all()->where('status','Processing');

        if(request()->filterStatus ?? false){
            $appliedProgrammes = AppliedProgramme::all()->where('status',request()->filterStatus);
        }

        return view('officer.appliedProgrammes.index',[
            'appliedProgrammes' => $appliedProgrammes,
            'countProcessing' => AppliedProgramme::where('status', 'Processing')->count(),
            'countApproved' => AppliedProgramme::where('status', 'Approved')->count(),
            'countRejected' => AppliedProgramme::where('status', 'Rejected')->count()
        ]);
    }

    public function update(AppliedProgramme $appliedProgramme)
    {
        $attributes = request()->validate([
            'status' => ['required',Rule::in(['Approved','Rejected'])],
        ]);
        
        if ($attributes['status'] == 'Approved'){
            $interview = Interview::whereRelation('interviewPeriod', 'programme_id', $appliedProgramme->programme_id)->where('applied_programme_id', NULL)->first();
            if($interview ?? false){
                $interview->update([
                    'applied_programme_id' => $appliedProgramme->id,
                    'userAccepted' => 'Requesting'
                ]);
                $appliedProgramme->update(['autoAssigned' => true]);

                Mail::to($appliedProgramme->user)->send(new InterviewArranged($interview));
            }
        }

        $appliedProgramme->update($attributes);
        Mail::to($appliedProgramme->user)->send(new AppliedProgrammeHandled($appliedProgramme));

        return redirect('/officer/appliedProgrammes')->with('success', 'Applying Programme Application ' . request()->status);
    }
}
