<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $role
 */
class Task extends Model
{
   use HasFactory;

   protected $fillable = [
      'role',
   ];
}
