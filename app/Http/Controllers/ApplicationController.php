<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Application;

class ApplicationController extends Controller
{
    public function create()
    {   
        if($application = Application::where('user_id', Auth::user()->id)->first() ?? false){
            return redirect('/applications/' . $application->id .'/edit');
        }else{
            return view('applications.create');
        }
    }

    public function store()
    {   
        $application = Application::create([ 'user_id'=> Auth::user()->id ]);

        return redirect('/applications/' . $application->id . '/edit');
    }

    public function edit(Application $application)
    {   
        if (! Gate::allows('edit-application', $application)) {
            abort(403);
        }

        return view('applications.edit', [ 'application'=> $application ]);
    }

    public function update(Application $application)
    {   
        if (request()->formName == 'Personal Particular'){
            $attributes = request()->validate([
                'englishName' => ['required','max:255'],
                'sex' => ['required', Rule::in(['male', 'female'])],
                'dateOfBirth' => ['required', 'date' ],
                'nationality' => ['required', 'max:255'],
                'homephoneNumber' => ['required', 'size:8'],
                'mobileNumber' => ['required', 'size:8'],
                'mailingAddress' => ['required', 'max:255'],
            ]);
            $attributes['personalFilled'] =  request()->personalFilled;
        }elseif (request()->formName == 'Academic Profile'){
            $attributes = request()->validate([
                'secondaryCountry' => ['required','max:255'],
                'secondarySchool' => ['required', 'max:255'],
                'secondaryAdmission' => ['required', 'date'],
                'secondaryCompletion' => ['required', 'date'],
                'postCountry' => ['required', 'max:255'],
                'postSchool' => ['required', 'max:255'],
                'postProgramme' => ['required', 'max:255'],
                'postQualification' => ['required', Rule::in(['hd', 'asso', 'degree'])],
                'postMode' => ['required', Rule::in(['fullTime', 'partTime'])],
                'postCgpa' => ['numeric', 'max:4.3'],
                'postMaxCgpa' => ['numeric', 'max:4.3'],
                'postAdmission' => ['required', 'date'],
                'postCompletion' => ['required', 'date'],
            ]);
            $attributes['acadeFilled'] =  request()->acadeFilled;
        }

        $application->update($attributes);

        return back()->with('success', request()->formName . ' Saved!');
    }

    public function show(Application $application)
    {   
        return view('applications.show', [ 'application' => $application ]);
    }
}
