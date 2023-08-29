<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\AppliedProgramme;
use App\Models\Programme;
use App\Models\Application;
use App\Models\File;

class AppliedProgrammeController extends Controller
{   
    public function index()
    {   
        $appliedProgrammes = AppliedProgramme::where('user_id', Auth::user()->id)->get();

        return view('appliedProgrammes.index',['appliedProgrammes' => $appliedProgrammes]);
    }

    public function create()
    {   
        if (AppliedProgramme::where('user_id', Auth::user()->id)->count() > 0){
            return redirect('/appliedProgrammes')->with('warning', 'You have already applied the programme(s)!');
        }

        if (Application::where('user_id', Auth::user()->id)->where('personalFilled', true)->where('acadeFilled', true)->count() > 0 &&
            File::where('user_id', Auth::user()->id)->where('name', "Post-Secondary Transcript")->count() > 0){
            return view('appliedProgrammes.create', ['programmes' => Programme::all()]);
        }

        if (Application::where('user_id', Auth::user()->id)->count() == 0){
            return redirect('/applications/create')->with('warning','Submit Application Form First!');
        }
        
        $requirement = "";
        if (Application::where('user_id', Auth::user()->id)->where('personalFilled', true)->count() == 0){
            $requirement .= '<li><a href="/applications/' . Application::where('user_id', Auth::user()->id)->first()->id . '/edit" style="color: blue">Submit Personal Particular Form</a></li>';
        }
        if (Application::where('user_id', Auth::user()->id)->where('acadeFilled', true)->count() == 0){
            $requirement .= '<li><a href="/applications/' . Application::where('user_id', Auth::user()->id)->first()->id . '/edit" style="color: blue">Submit Academic Profile Form</a></li>';
        }
        if (File::where('user_id', Auth::user()->id)->where('name', "Post-Secondary Transcript")->count() == 0){
            $requirement .= '<li><a href="/files" style="color: blue">Upload the PDF file of your Post-Secondary Transcript</a></li>';
        }
        return view('appliedProgrammes.create', ['requirement' => $requirement]);
    }

    public function store()
    {      
        $attributes = request()->validate([
            'programme1' => ['required'],
            'year1' => ['required', Rule::in([1, 3])],
            'programme2' => ['required'],
            'year2' => ['required', Rule::in([1, 3])],
            'programme3' => ['required'],
            'year3' => ['required', Rule::in([1, 3])],
        ]);

        for ($x = 1; $x <= 3; $x++){
            AppliedProgramme::create([
                'user_id' => Auth::user()->id,
                'rank'=> $x,
                'programme_id' => $attributes['programme'. $x],
                'year' => $attributes['year'. $x]  
            ]);
        }
        return redirect('/appliedProgrammes')->with('success', 'Apply Programme(s) Success');
    }

    public function update(AppliedProgramme $appliedProgramme)
    {      
        $attributes = request()->validate(['changingTime' => ['required', 'in:true']]);
        $attributes['autoAssigned'] = 'false';

        $appliedProgramme->update($attributes);

        return redirect('/appliedProgrammes')->with('success', 'Changing Interview Time Request Sent!');
    }
}
