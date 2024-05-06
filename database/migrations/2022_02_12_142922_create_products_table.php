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
            $table->id()->unsigned();
            $table->string('title');
            $table->integer('price');
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('offer')->default(0);
            $table->integer('offerprice')->nullable();
            $table->string('place')->nullable();
            $table->integer('brand_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->text('description');
            $table->string('slug');
            $table->tinyInteger('status')->default(0);
            $table->integer('admin_id')->unsigned();                                                                                                                                                                                                                              
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
