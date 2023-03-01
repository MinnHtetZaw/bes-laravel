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
        Schema::create('hospital_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('room_charges')->default(0);
            $table->integer('service_charges')->default(0);
            $table->integer('medicine_charges')->default(0);
            $table->integer('machine_charges')->default(0);
            $table->integer('total_amount');
            $table->integer('deposit_amount')->default(0);
            $table->integer('net_amount');
            $table->date('date');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('admission_id');
            $table->enum('status',[0,1,2])->default(0);
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
        Schema::dropIfExists('hospital_bills');
    }
};
