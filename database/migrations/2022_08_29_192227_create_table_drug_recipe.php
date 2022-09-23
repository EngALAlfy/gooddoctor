<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDrugRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_recipe', function (Blueprint $table) {
            $table->id();
            $table->integer('repeat_every_hours')->nullable();
            $table->string('amount')->nullable();
            $table->string('info' , 400)->nullable();
            $table->foreignIdFor(\App\Models\Drug::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Recipe::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_drug_recipe');
    }
}
