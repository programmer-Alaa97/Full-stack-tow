<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }


    public function index()
    {
        $users = User::latest()->paginate(4);
        return view('users.index')->with('users' ,$users);
    }


    public function create()
    {
        return view('users.create');
    }



    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

           ]);

          $user =  User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password ),
        ]);


        return redirect()->route('users');


    }



    public function show()
    {
        //
    }



    public function edit()
    {
        //
    }



    public function update(Request $request)
    {
        //
    }



    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();
        return redirect()->route('users');
    }


    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        return redirect()->route('users');
    }

    public function notAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        return redirect()->route('users');
    }


}
