<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
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
        Schema::dropIfExists('bikes');
    }
}
