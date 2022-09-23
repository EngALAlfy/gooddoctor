<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type' , ['instructions' , 'forbiddens' , 'warnings' , 'diet'])->default('instructions');
            $table->text('list');
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->nullOnDelete();
            // $table->foreignIdFor(\App\Models\Appointment::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('instructions');
    }
}
