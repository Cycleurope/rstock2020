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
            $table->bigIncrements('id');
            $table->string('mmitno');
            $table->string('mmitds')->nullable();
            $table->string('mmitcl')->nullable();
            $table->string('mmitgr');
            $table->integer('mbstat')->nullable();
            $table->string('mmspe1')->nullable();
            $table->string('mmspe2')->nullable();
            $table->string('mmspe3')->nullable();
            $table->integer('mbstqt')->default(0);
            $table->integer('mbaval')->default(0);
            $table->char('size', 2)->nullable();
            $table->bigInteger('family_id')->nullable()->unsigned();
            $table->foreign('family_id')->references('id')->on('product_family')->onDelete('cascade');
            $table->string('type', 8)->default('other');
            $table->string('label')->nullable();
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
