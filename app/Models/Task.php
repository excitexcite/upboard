<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property string $name
 * @property string $type
 * @property string $status
 * @property Carbon $start_at
 * @property Carbon $end_at
 * @property Carbon $estimate
 */
class Task extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'start_at',
      'end_at',
      'estimate',
      'type',
      'status',
   ];

   protected $dates = [
      'start_at',
      'end_at',
      'estimate'
   ];

   public function project()
   {
      return $this->belongsTo(Project::class);
   }
}
