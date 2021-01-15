<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandomUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('random_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->enum('gender', ['male', 'female']);
            $table->dateTime('birthdate');
            $table->dateTime('registered_date');

            $table->string('phone');
            $table->string('cell');
            $table->string('nation');

            $table->timestamps();

            // foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('random_users');
    }
}
