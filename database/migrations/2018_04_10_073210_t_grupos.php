<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('short_id')->unsigned()->nullable();
            $table->string('name');

            $table->integer('championship_id')->unsigned()->index(); // A checar
            $table->foreign('championship_id')
                ->references('id')
                ->on('championships')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            
            $table->string('picture')->nullable();

/*            $table->integer('entity_id')->unsigned()->nullable()->index();
*/            $table->timestamps();

            $table->unique(['short_id', 'championship_id', 'name']);
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
        Schema::drop('teams');
        Schema::enableForeignKeyConstraints();
    }
}
