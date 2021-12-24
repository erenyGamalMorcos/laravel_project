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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
//            $table->enum('type', ['admin', 'customer', 'superadmin']);
            $table->string('password');
//            $table->integer('country_id')->unsigned();
//            $table->integer('city_id')->unsigned();
//            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();


//            $table->foreign('country_id')->references('id')->on('countries')
//                ->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('city_id')->references('id')->on('cities')
//                ->onDelete('cascade')->onUpdate('cascade');
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
