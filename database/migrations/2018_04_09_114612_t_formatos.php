<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TFormatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['1v1', '2V2'])->default('1v1');
            $table->enum('tematica', ['free'])->default('free');
            $table->enum('patrones', ['4x4'])->default('4x4');
            $table->integer('isTeam')->unsigned()->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('championships', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tournament_id')->unsigned()->index();
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unique(['tournament_id', 'category_id']);

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });

        Schema::create('competitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('short_id')->unsigned()->nullable();
            $table->integer('championship_id')->unsigned()->index();
            $table->foreign('championship_id')
                ->references('id')
                ->on('championships')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['championship_id', 'short_id']);
            $table->unique(['championship_id', 'user_id']);

            $table->boolean('confirmed');

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('competitors');
        Schema::dropIfExists('championships');
        Schema::dropIfExists('categories');
        Schema::enableForeignKeyConstraints();
    }
}
