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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->enum('type',[0,1])->comment('0 is IP, 1 is OP');
            $table->string('name');
            $table->integer('age');
            $table->enum('gender',[0,1])->comment('0 is male,1 is female');
            $table->string('phone');
            $table->string('nrc');
            $table->string('emergency_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('nationality');
            $table->string('ethnicity')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->longText('address');
            $table->integer('deposit_amount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('credit_amount')->default(0);
            $table->integer('floor_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('bed_id')->nullable();
            $table->integer('primary_doctor_id')->nullable();
            $table->integer('assistant_doctor_id')->nullable();
            $table->boolean('is_admission')->default(false);
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
        Schema::dropIfExists('patients');
    }
};
