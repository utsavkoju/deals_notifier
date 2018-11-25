<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('current_price');
            $table->string('discount_rate');
            $table->string('image_url');
            $table->string('product_url')->nullable();
            $table->text('product_description')->nullable();
            $table->string('tags')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
