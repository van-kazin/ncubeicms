<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // profile-user relation
   public function profile()
   {
       return $this->hasOne(Profile::class);
   }

   public function income()
   {
       return $this->hasMany(Profile::class);
   }

   //special many to many relationship functions for asociation, department & language //
   public function hasPermissions($permissionId)
     {
         return in_array($permissionId, $this->permissions->pluck('id')->toArray());
     }

      public function messages()
      {
        return $this->hasMany(Message::class);
      }

}
