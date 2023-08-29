<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index()
    {   
        return view('programmes.index', ['programmes' => Programme::all() ]);
    }

    public function create()
    {   
        return view('programmes.create');
    }

    public function store()
    {   
        Programme::create($this->validateProgramme());

        return redirect('/programmes')->with('success', 'Programme Created!');
    }

    public function edit(Programme $programme)
    {
        return view('programmes.edit',['programme'=>$programme]);
    }

    public function update(Programme $programme)
    {   
        $programme->update($this->validateProgramme());

        return redirect('/programmes')->with('success', 'Programme Updated!');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();

        return redirect('/programmes')->with('success', 'Programme Deleted!');
    }

    protected function validateProgramme(?Programme $programme = null)
    {   
        $programme ??= new Programme();

        return request()->validate([
            'category' => ['required', Rule::in(['Arts','Business','Science'])],
            'name' => ['required', 'max:255', Rule::unique('programmes', 'name')->ignore($programme->id)],
            'year1RequiredCgpa' => ['required', 'numeric', 'max:4.3'],
            'year3RequiredCgpa' => ['required', 'numeric', 'max:4.3']
        ]);
    }

}
