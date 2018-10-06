<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

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
            NestedSet::columns($table);
            $table->string('product_id')->nullable();
            $table->string('active')->default('N');
            $table->string('date_update')->nullable();
            $table->string('articul')->nullable();
            $table->string('name');
            $table->text('about')->nullable();
            $table->integer('section')->nullable();
            $table->string('image')->nullable();
            $table->float('price_base')->nullable();
            $table->float('price_old')->nullable();
            $table->float('price_sp')->nullable();
            $table->integer('min')->nullable();
            $table->integer('box')->nullable();
            $table->integer('fix')->nullable();
            $table->integer('new')->nullable();
            $table->integer('hit')->nullable();
            $table->string('brand')->nullable();
            $table->integer('store_ekb')->nullable();
            $table->integer('store_msk')->nullable();
            $table->integer('store_nsk')->nullable();
            $table->string('way')->nullable();
            $table->string('barcode')->nullable();
            $table->string('props')->nullable();
            $table->string('specifications')->nullable();
            $table->string('includes')->nullable();

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
