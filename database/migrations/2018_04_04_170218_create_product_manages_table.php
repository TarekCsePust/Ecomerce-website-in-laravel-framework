<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_manages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('pro_cat_id');
            $table->string('product_name');
            $table->integer('actual_price');
            $table->integer('offer_price')->default(-1);
            $table->integer('quantity');
            $table->string('image');
            $table->string('description');
            $table->integer('publish')->default(0);
            $table->integer('new_arrivel')->default(0);
            $table->string('size')->default('NULL');
            $table->string('color')->default('NULL');
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
        Schema::dropIfExists('product_manages');
    }
}
