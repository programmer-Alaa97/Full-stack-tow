<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class frontEndController extends Controller
{
    public function index()
    {

        return view('index')->with('users' , User::all());

    }
}
