<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TGrupoBatallasGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighters_group_team', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('fighters_group_id')->unsigned()->index();
            $table->foreign('fighters_group_id')
                ->references('id')
                ->on('fighters_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('order')->unsigned()->nullable();
            $table->timestamps();

            $table->unique(['team_id', 'fighters_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('fighters_group_team');
        Schema::enableForeignKeyConstraints();
    }
}
