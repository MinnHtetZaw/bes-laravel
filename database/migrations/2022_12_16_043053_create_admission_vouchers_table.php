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
        Schema::create('admission_vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('patient_id');
            $table->unsignedBigInteger('admission_id');
            $table->unsignedBigInteger('discharge_id');
            $table->integer('hospital_charges')->default(0);
            $table->integer('service_charges')->default(0);
            $table->integer('medicine_charges')->default(0);
            $table->integer('laboratory_charges')->default(0);
            $table->integer('radiology_charges')->default(0);
            $table->integer('total_amount');
            $table->integer('pay_amount');
            $table->integer('balance_amount');
            $table->integer('refund_amount');
            $table->string('payment_type');
            $table->date('date');
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
        Schema::dropIfExists('admission_vouchers');
    }
};
