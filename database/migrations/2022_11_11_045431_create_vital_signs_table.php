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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_record_id');
            $table->string('t')->default('-');
            $table->string('bp')->default('-');
            $table->string('spo2')->default('-');
            $table->string('b_w')->default('-');
            $table->string('pr')->default('-');
            $table->string('hr')->default('-');
            $table->string('rr')->default('-');
            $table->longText('complaint')->nullable();
            $table->longText('physical_examination')->nullable();
            $table->longText('procedure')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->date('next_appointment_date')->nullable();
            $table->enum('ot_room',[0,1])->default(0)->comment('0 is No, 1 is Yes');
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
        Schema::dropIfExists('vital_signs');
    }
};
