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
        Schema::create('medication_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medication_id');
            $table->unsignedBigInteger('medicine_id');
            $table->integer('qty');
            $table->integer('day');
            $table->string('dose');
            $table->longText('sig')->nullable();
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
        Schema::dropIfExists('medication_items');
    }
};
