<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TCompeticionSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias')->nullable();

            $table->integer('championship_id')->unsigned()->unique();
            $table->foreign('championship_id')
                ->references('id')
                ->onUpdate('cascade')
                ->on('championships')
                ->onDelete('cascade');

            // Category Section
            $table->enum('treeType', ['direct_elimination','play_off'])->default('direct_elimination');
            $table->integer('limitByEntity')->unsigned()->nullable();

            // Preliminary
            $table->boolean('hasPreliminary')->default(1);
            $table->boolean('preliminaryGroupSize')->default(1);
            $table->tinyInteger('preliminaryWinner')->default(32); // Number of Competitors that go to next level

            // Team
            $table->tinyInteger('teamSize')->nullable(); // Default is null
            $table->tinyInteger('teamReserve')->nullable(); // Default is null

            // Seed
            $table->smallInteger('seedQuantity')->nullable(); // Competitors seeded in tree

            //TODO This should go in another table that is not for tree construction but for rules
            // Rules

            $table->smallInteger('cost')->nullable(); // Cost of competition

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
        Schema::dropIfExists('championship_settings');
        Schema::enableForeignKeyConstraints();
    }
}
