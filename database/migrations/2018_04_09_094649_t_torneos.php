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

            $table->Integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('slug')->unique();
            $table->date('dateIni')->useCurrent();
            $table->date('dateFin');
            $table->string('promoter')->nullable();
            $table->string('host_organization')->nullable();
            $table->integer('rule_id')->default(1);
            $table->enum('type', ['open', 'invitation']);
            $table->enum('level', ['ND', 'local', 'municipal', 'regional', 'nacional', 'internacional' ]
            )->default('local');

            $table->integer('venue_id')->nullable()->unsigned();
            $table->foreign('venue_id')
                ->references('id')
                ->on('venues');

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
