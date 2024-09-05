<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return view ('users.index', compact('users'));
    }

    public function create() 
    {
        return view ('users.create');
    }

    public function store(Request $request) 
    {

        $listUser = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        $listUser['password'] = bcrypt($listUser['password']);

        User::create($listUser);

        return redirect()->route('users.index')->with('success', 'User successfully created!');
    }

    public function edit(string $id)
    {
        $users = User::find($id);

        return view('users.edit', compact('users'));
    }

    public function update (Request $request, $id) 
    {
        $listUser = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::find($id);

        $listUser['password'] = bcrypt($listUser['password']);

        $user->update($listUser);  
        
        return redirect()->route('users.index')->with('success', 'User successfully updated!');
    }

    public function destroy($id) 
    {
        User::find($id)->delete();

        return redirect()->route('users.index')->with('success', 'User successfully deleted!');
    }
}
