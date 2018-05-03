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

            $table->integer('championship_id')->unsigned()->nullable()->index();
            $table->foreign('type_id')
                ->references('id')
                ->on('championships')
                ->onDelete('cascade');

            $table->integer('type_id')->unsigned()->nullable()->index();
            $table->foreign('type_id')
                ->references('id')
                ->on('type_category')
                ->onDelete('cascade');

            $table->integer('tematica_id')->unsigned()->nullable()->index();
            $table->foreign('tematica_id')
                ->references('id')
                ->on('tematica_category')
                ->onDelete('cascade');

            $table->integer('patrones_id')->unsigned()->nullable()->index();
            $table->foreign('patrones_id')
                ->references('id')
                ->on('patrones_category')
                ->onDelete('cascade');

            $table->integer('isTeam')->unsigned()->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('championships', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('slug');

            $table->integer('tournament_id')->unsigned()->index();
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('venue_id')->nullable()->unsigned();
            $table->foreign('venue_id')
                ->references('id')
                ->on('venues');

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
