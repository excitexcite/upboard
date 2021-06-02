<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectUser extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('project_user', function (Blueprint $table) {
         $table->id();
         $table->timestamps();

         $table->enum('role', ['developer', 'qa', 'pm', 'ceo']);

         $table->foreignId('project_id')->constrained();
         $table->foreignId('user_id')->constrained();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      //
   }
}
