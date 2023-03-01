<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_record_id');
            $table->unsignedBigInteger('medicine_id');
            $table->integer('qty');
            $table->integer('day');
            $table->string('dose');
            $table->longText('sig')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('total_qty');
            $table->integer('sub_total');
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
        Schema::dropIfExists('medicine_items');
    }
};
