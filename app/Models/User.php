<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable implements JWTSubject
{
   use HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'first_name',
      'last_name',
      'username',
      'email',
      'password',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   public function allProjects()
   {
      return $this->projects()->get()->merge($this->invitedToProjects()->get());
   }

   public function projects()
   {
      return $this->hasMany(Project::class);
   }

   public function invitedToProjects()
   {
      return $this->belongsToMany(Project::class)->withPivot('role')->withTimestamps();
   }

   public function fullName(): string
   {
      if ($this->first_name && $this->last_name) {
         return "$this->first_name $this->last_name";
      }

      return $this->username;
   }

   public function getJWTIdentifier()
   {
      return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
      return [];
   }
}
