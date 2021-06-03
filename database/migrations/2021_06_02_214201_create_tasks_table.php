<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('tasks', function (Blueprint $table) {
         $table->id();
         $table->timestamps();

         $table->string('name');
         $table->timestamp('start_at');
         $table->timestamp('end_at')->nullable();
         $table->timestamp('estimate');
         $table->enum('type', ['feature', 'bug']);
         $table->enum('status', ['new', 'in_progress', 'resolved', 'feedback', 'closed']);

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
      Schema::dropIfExists('tasks');
   }
}
