<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLiftsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lifts', function(Blueprint $table) {
            $table->increments('id');
            $table->float('weight_lifted');
            $table->float('bodyweight');
            $table->date('date_performed')->nullable();
            $table->string('evidence')->nullable();

            $table->integer('lift_variation_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_lifts');
    }

}
