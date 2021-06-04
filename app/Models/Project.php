<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\SlugOptions;

/**
 * @property string $name
 * @property string $slug
 * @property string $contract
 * @property string $contract_type
 * @property Carbon $start_at
 * @property Carbon $end_at
 */
class Project extends Model
{
   use HasFactory, HasSlug;

   protected $fillable = [
      'name',
      'contract',
      'contract_type',
      'start_at',
      'end_at'
   ];

   protected $dates = [
      'start_at',
      'end_at'
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function users()
   {
      return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
   }

   public function tasks()
   {
      return $this->hasMany(Task::class);
   }

   public function getUserRole($user): string
   {
      if ($this->user()->is($user)) {
         return "admin";
      }

      $pivots = DB::select('select role from project_user where project_id = :project_id and user_id = :user_id limit 1', [
         'project_id' => $this->id,
         'user_id' => $user->id,
      ]);
      if (!empty((array)$pivots)) {
         return $pivots[0]->role;
      }

      return "guest";
   }

   public function getSlugOptions(): SlugOptions
   {
      return SlugOptions::create()
         ->generateSlugsFrom('name')
         ->saveSlugsTo('slug');
   }

   static private $rolesMap = [
      'admin' => 'Admin',
      'guest' => 'Guest',
      'developer' => 'Dev',
      'qa' => 'QA',
      'pm' => 'PM',
      'ceo' => 'CEO',
   ];

   static public function readableRole(string $role): string
   {
      return Project::$rolesMap[$role];
   }
}
