<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TCompetidoresGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitor_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->integer('competitor_id')->unsigned()->index();
            $table->integer('order')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('competitor_id')
                ->references('id')
                ->on('competitors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['team_id', 'competitor_id']);
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
        Schema::dropIfExists('competitor_team');
        Schema::enableForeignKeyConstraints();
    }
}
