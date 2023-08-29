<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::where('role', '!=', 'admin')->get();
        
        if (request()->filterRole ?? false){
            $users = User::where('role', request()->filterRole)->get();
        }

        return view('users.index',[
            'users' => $users,
            'countAll' => User::where('role', '!=', 'admin')->count(),
            'countUsers' => User::where('role', 'user')->count(),
            'countOfficers' => User::where('role', 'officer')->count()
        ]);
    }

    public function create() //create Officer Account
    {
        return view('users.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:officer']
        ]);
        $attributes['email_verified_at'] = now();

        User::create($attributes);

        return redirect('users')->with('success', 'Officer Account Created!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success','Account Deleted');
    }
}
