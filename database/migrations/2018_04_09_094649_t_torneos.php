<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TTorneos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('slug')->unique();
            $table->date('dateIni')->nullable();
            $table->date('dateFin')->nullable();
            $table->string('promoter')->nullable();
            $table->string('host_organization')->nullable();
            $table->integer('rule_id')->default(1);
            $table->enum('type', ['open', 'invitation']);

            $table->Integer('level_id')->unsigned()->nullable()->index();
            $table->foreign('level_id')
                ->references('id')
                ->on('tournament_level')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('tournaments');
        Schema::enableForeignKeyConstraints();
    }
}
