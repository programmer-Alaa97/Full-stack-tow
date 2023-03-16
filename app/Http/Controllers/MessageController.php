<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        // $messages = Message::get();

        $messages = Message::latest()->paginate(4);
        // return view('messages.index', compact('messages'))->with('messages', $messages);
        return view('messages.index')->with('messages' ,$messages);

        // $users = User::orderBy('created_at','desc')->get();
        // return view('users.index')->with('users' ,$users);
    }        

//orderBy('created_at', 'desc')->paginate(4)->get();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('messages.send', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            //'sender_name' => 'required',
            'resaver_name' => 'required',
            'msg_content' => 'required',
            'photo' => 'required|image',
            'password' => ['required', 'string', 'min:8'],
            // 'userID' => 'required',

        ]);


        $photo = $request->photo;
        $photo_new_name = time() . $photo->getClientOriginalName();
        $photo->move('uploads/image', $photo_new_name);




        // return  $request;
        // return Auth()->user()->id;
        $message =  Message::create([
            // 'sender_id' => $request->sender_name,
            'sender_name' => Auth()->user()->id,
            'resaver_name' => $request->resaver_name,
            'msg_content' => $request->msg_content,
            // 'photo' => 'uploads/image/',
            'photo' => 'uploads/image/' . $photo_new_name,
            // 'password' => Hash::make($request->password ),
            'password' => $request->password ,
            // 'password' => Crypt::encryptString($request->password),

            // 'userID' => Auth()->user()->id,
            // 'userID' => Auth()->user()->name,


        ]);
        return redirect()->back()->with('success', 'message send successflly'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    // public function show(Message $message)
    // {

    //     $messages = Message::orderBy('created_at', 'desc')->get();
    //     return view('messages.index')->with('messages' ,$messages);

    // }

    public function show($id)
    {
        $message = Message::where('id', $id)->first();
        return view('messages.received')->with('message' ,$message);
    }

    /**
     * Show the form for editing the  specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::where('id', $id)->first();
        $message->delete();
        return redirect()->route('messages');
    }

   


}
