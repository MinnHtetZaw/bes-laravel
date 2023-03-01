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
        Schema::create('medicine_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->string('code');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->bigInteger('current_qty')->default(0);
            $table->bigInteger('reorder_qty')->default(0);
            $table->bigInteger('purchase_price')->default(0);
            $table->bigInteger('selling_price')->default(0);
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
        Schema::dropIfExists('medicine_units');
    }
};
