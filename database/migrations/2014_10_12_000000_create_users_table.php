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
            $table->string('name');
            $table->string('nickname')->unique()->nullable();
            $table->string('email')->unique();
            $table->boolean('isAdmin')->default(false);
            $table->date('birth_date')->nullable();                  // Year-Month-Day format
            $table->text('bio')->nullable();
            $table->string('image_path')->nullable();               // For profile picture (avatar)
            $table->string('bg_image_path')->nullable();            // For profile background (bg)
            $table->string('website')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
