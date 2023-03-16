<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;




class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'msg_content', 'sender_name', 'resaver_name','password'
        // ,'userID'
    ];

    // public function users()
    // {
    //     return $this->belongsToMany('App\User');
    // }

    // public function user()
    // {
    //     return $this->hasMany('App\User');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function rev_user()
    {
        return $this->belongsTo(User::class, 'resaver_name');
    }

    public function send_user()
    {
        return $this->belongsTo(User::class, 'sender_name');
    }

    public function setPasswordAttribute($value)
    {
     
        $this->attributes['password'] = Crypt::encryptString($value);
        
    }

    public function getPasswordAttribute($value)
    {
        try 
        {
            return Crypt::decryptString($value);

        } catch (\Exception  $e) {
           
            return $value;
        }
            
    }
}



//,'userID'
