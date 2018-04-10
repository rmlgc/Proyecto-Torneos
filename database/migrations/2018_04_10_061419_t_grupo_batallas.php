<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class TGrupoBatallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighters_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('short_id')->unsigned()->nullable();

            $table->integer('championship_id')->unsigned()->index();
            $table->foreign('championship_id')
                ->references('id')
                ->onUpdate('cascade')
                ->on('championships')
                ->onDelete('cascade');

            $table->tinyInteger('round')->default(0); // Eliminitory, 1/8, 1/4, etc.
            $table->tinyInteger('order');
            NestedSet::columns($table);

            $table->timestamps();
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
        Schema::dropIfExists('fighters_groups');
        Schema::enableForeignKeyConstraints();
    }
}
