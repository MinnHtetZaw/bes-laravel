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
        Schema::create('procedure_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_record_id');
            $table->string('name');
            $table->integer('qty')->default(1);
            $table->integer('price')->default(0);
            $table->integer('sub_total')->default(0);
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
        Schema::dropIfExists('procedure_items');
    }
};
