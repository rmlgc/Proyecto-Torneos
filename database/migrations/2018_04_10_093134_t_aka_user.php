<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TAkaUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aka_user', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('short_id')->unsigned()->nullable();
            $table->string('aka');

            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->tinyInteger('selected')->default(1);
            $table->timestamps();

            $table->unique(['short_id', 'aka', 'user_id' ]);
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
        Schema::dropIfExists('aka_user');
        Schema::enableForeignKeyConstraints();
    }
}
