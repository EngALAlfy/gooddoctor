<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_disease', function (Blueprint $table) {
            $table->id();
            $table->string('treatment_method' , 500)->nullable();
            $table->string('diagnosis' , 500)->nullable();
            $table->string('symptoms' , 500)->nullable();
            $table->string('info' , 400)->nullable();
            $table->foreignIdFor(\App\Models\Disease::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Appointment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('appointment_disease');
    }
}
