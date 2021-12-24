<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->boolean('active')->default(true);
//            $table->integer('country_id')->unsigned();
            $table->timestamps();

            $table->foreignId('country_id')->references('id')->on('countries')
                ->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('country_id')->constrained(); // try it rather than foreign above
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
