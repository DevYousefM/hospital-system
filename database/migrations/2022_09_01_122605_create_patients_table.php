<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id("patient_id");
            $table->string("patient_name");
            $table->integer("patient_age");
            $table->string("opration_name");
            $table->string("contract_type");
            $table->string("doctor_name");
            $table->date("entry_date");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
