<?php

namespace App\Http\Livewire;
use App\Http\Controllers\MessageController;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\User as Authenticatable;




class MassegeRec extends Component
{

    use WithFileUploads;


    public $totalSteps = 3;
    public $currentStep = 1;
    public $admin,$email,$name,$message,$user;
    public $view_student_id, $view_student_name, $view_student_email;

    

    public function mount(){
        $this->currentStep = 1;
    }



    public function render(){
   
        // return view('livewire.massege-rec');
        $users = User::all();
        $messages = Message::all();
        return view('livewire.massege-rec', [
            'users' => $users,
            'messages' => $messages
        ])->extends('layouts.app');


   }


    public function increaseStep(){
        $this->resetErrorBag();
        // $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

}
