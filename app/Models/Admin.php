<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

//use traite

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //use esm el trait nfso
    // trait single responsibly

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $appends = ['password','image'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
//not working
//    public function setImageAttribute($adminImage)
//    {
//        if(is_object($adminImage) && $adminImage->isValid())
//        {
//            if ($image = $adminImage) {
//                $destinationPath = public_path('admins');
//                $file_name = $image->getClientOriginalName();
//                $image->move($destinationPath, $file_name);
//                $this->attributes['image']  = $file_name;
//
//            }
//        }
//    }


}
