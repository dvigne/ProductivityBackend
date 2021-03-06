<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Team extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team', function(Blueprint $table) {
        $table->uuid('id');
        $table->string('name');
        $table->timestamps();
        $table->primary('id');
      });

      Schema::table('tasks', function(Blueprint $table) {
        $table->uuid('team_id')->after('id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function(Blueprint $table) {
        $table->dropColumn('team_id');
      });
      Schema::drop('team');
    }
}
