<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table) {
          $table->uuid('id');
          $table->uuid('assigned')->nullable();
          $table->string('name');
          $table->text('description')->nullable();
          $table->string('category')->nullable();
          $table->enum('status', ['to-do', 'in progress', 'done'])->default('to-do');
          $table->timestamp('due')->nullable();
          $table->timestamps();
          $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
