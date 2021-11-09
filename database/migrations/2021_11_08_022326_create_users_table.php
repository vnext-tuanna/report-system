<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->binary('image');
            $table->string('email')->unique();
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('follow_id');
            $table->unsignedBigInteger('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('follow_id')->references('id')->on('follows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
