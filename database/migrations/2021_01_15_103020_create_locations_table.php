<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('random_user_id');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->unsignedMediumInteger('postcode');
            $table->double('latitude');
            $table->double('longitude');

            $table->timestamps();

            // foreign keys
            $table->foreign('random_user_id')->references('id')->on('random_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
