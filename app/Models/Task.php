<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property string $name
 * @property string $type
 * @property string $status
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property Carbon $estimate
 */
class Task extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'start_time',
      'end_time',
      'estimate',
      'type',
      'status',
   ];

   public function project()
   {
      return $this->belongsTo(Project::class);
   }
}
