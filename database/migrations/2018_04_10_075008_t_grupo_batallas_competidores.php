<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TGrupoBatallasCompetidores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighters_group_competitor', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('competitor_id')->unsigned()->nullable()->index();
            $table->foreign('competitor_id', 'FK_competitor')
                ->references('id')
                ->on('competitors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('fighters_group_id')->unsigned()->index();
            $table->foreign('fighters_group_id', 'FK_fighters_group')
                ->references('id')
                ->on('fighters_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->integer('order')->unsigned()->nullable();
            $table->timestamps();

            $table->unique(['competitor_id', 'fighters_group_id']);
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
        Schema::dropIfExists('fighters_group_competitor');
        Schema::enableForeignKeyConstraints();
    }
}
