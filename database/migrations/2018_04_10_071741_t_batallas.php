<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TBatallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fights')) {
            Schema::create('fight', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('short_id')->unsigned()->nullable();

                $table->integer('fighters_group_id')->unsigned()->index();
                $table->foreign('fighters_group_id')
                    ->references('id')
                    ->on('fighters_groups')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                
                $table->integer('c1')->nullable()->unsigned()->index();
                $table->integer('c2')->nullable()->unsigned()->index();
                
/*                $table->char('point1_c1')->nullable();
                $table->char('point2_c1')->nullable();
                $table->char('point1_c2')->nullable();
                $table->char('point2_c2')->nullable();
*/                $table->integer('winner_id')->unsigned()->nullable();

                $table->string('video')->nullable();
                $table->tinyInteger('order')->default(1);
                $table->timestamps();
                $table->engine = 'InnoDB';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('fights');
        Schema::enableForeignKeyConstraints();
    }
}
