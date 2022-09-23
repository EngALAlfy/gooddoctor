<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePatientRay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_ray', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Appointment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Ray::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_patient_ray');
    }
}
