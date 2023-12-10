<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;




class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

   


    protected $fillable = [
        'name',
        'email',
        'gender',
        'mobile',
        'image',
        'status',
        'birth_balance',
    
        
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
       
    ];
  


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
  
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}