<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'title',
        'author',
        'info',
        'image',
        'book',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function books(){
        return $this->hasMany(Book::class);
    }
    public  function comment(){
        return $this->hasMany(Comment::class);
    }
    public  function roles(){
        return $this->belongsToMany(Role::class,'roles_users','user_id','role_id');
    }
    public  function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)) {
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)) {
                return true;
            }
        }
        return  false;
    }
    protected  function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return  false;
    }
}
