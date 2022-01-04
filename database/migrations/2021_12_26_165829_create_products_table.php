<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->double( 'original_price' );
            $table->double( 'discount_price' );
            $table->tinyInteger( 'in_stock' )->default( 1 );
            $table->tinyInteger( 'status' )->default( 0 );

            $table->foreignId('category_id')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_sub_category_id')->references('id')->on('sub_sub_categories')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
