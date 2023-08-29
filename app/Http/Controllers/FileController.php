<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class FileController extends Controller
{
    public function index()
    {   
        $postSecondaryTranscript = File::where('user_id', Auth::user()->id)
                                        ->where('name','Post-Secondary Transcript')->first();

        $files = File::where('user_id', Auth::user()->id)
                        ->whereNotIn('name',['Post-Secondary Transcript'])->get();

        return view('files.index', [
            'postSecondaryTranscript' => $postSecondaryTranscript,
            'files' => $files
        ]);
    }

    public function create()
    {   
        return view('files.create', ['createFile' => request()->createFile]);
    }

    public function store()
    {   
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'uploadFile' => ['required', 'mimes:pdf', 'max:2048']
        ]);

        File::create([
            'user_id' => Auth::user()->id,
            'name' => $attributes['name'],
            'originalName' => $attributes['uploadFile']->getClientOriginalName(),
            'path' => $attributes['uploadFile']->store('files')
        ]);

        return redirect('/files')->with('success', $attributes['name'] . ' Uploaded!');
    }

    public function edit(File $file)
    {   
        if (! Gate::allows('edit-file', $file)) {
            abort(403);
        }

        $postSecondaryTranscript = File::where('user_id', Auth::user()->id)
                                        ->where('name','Post-Secondary Transcript')->first();

        return view('files.edit', [
            'postSecondaryTranscript' => $postSecondaryTranscript,
            'file' => $file,
            'editFile' => request()->editFile
        ]);
    }

    public function update(File $file)
    {   
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'uploadFile' => ['mimes:pdf', 'max:2048']
        ]);

        if (request()->uploadFile ?? false){
            Storage::delete($file->path);
            $file->update([
            'name' => $attributes['name'],
            'originalName' => $attributes['uploadFile']->getClientOriginalName(),
            'path' => $attributes['uploadFile']->store('files')
            ]);
        }else{
            $file->update($attributes);
        }
        
        return redirect('/files')->with('success', $attributes['name'] . ' Updated!');
    }

    public function destroy(File $file)
    {   
        Storage::delete($file->path);
        $file->delete();

        return redirect('/files')->with('success', 'File Deleted!');
    }

    public function show(File $file)
    {   
        return view('files.show', [ 'files' => File::where('user_id', $file->user_id)->get() ]);
    }
}
