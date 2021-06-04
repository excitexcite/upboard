<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Carbon\Carbon;
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

   public function tasks()
   {
      return $this->hasMany(Task::class);
   }

   public function getUserRole($user): string
   {
      if ($this->user()->is($user)) {
         return "admin";
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
