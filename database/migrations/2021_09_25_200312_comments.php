<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function(Blueprint $table) {
        $table->uuid('id');
        $table->uuid('task_id');
        $table->text('comment');
        $table->primary('id');
        $table->foreign('task_id')->references('id')->on('tasks');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
