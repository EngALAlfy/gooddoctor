<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('info' , 400)->nullable();
            $table->string('symptoms' , 500)->nullable();

            $table->time('expected_time')->nullable();
            $table->time('enter_time')->nullable();
            $table->time('exit_time')->nullable();
            $table->enum('status' , ['hold' , 'cancelled' , 'entered' , 'exited'])->default('hold');
            $table->integer('order');

            $table->date('date')->default(Carbon::today());

            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(\App\Models\AppointmentType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(\App\Models\Patient::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Instructions::class)->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('appointments');
    }
}
