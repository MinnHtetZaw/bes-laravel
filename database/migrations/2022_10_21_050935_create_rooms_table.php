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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->string('type');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->bigInteger('price_per_day')->default(0);
            $table->integer('no_of_bed')->default(0);
            $table->enum('status',[0,1])->default(0)->comment('0 is available, 1 is unavailable');
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
        Schema::dropIfExists('rooms');
    }
};
