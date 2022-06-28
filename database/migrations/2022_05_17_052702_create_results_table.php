<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pid');
            $table->string('sid');
            $table->string('name');
            $table->date('entry_date');
            $table->date('date_of_test_result');
            $table->string('Amphetamine');
            $table->string('Benzodiazepines');
            $table->string('Opiates');
            $table->string('Cannabinoids');
            $table->string('Alcohol');
            $table->string('delivery_status');
            $table->string('remarks');
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
        Schema::dropIfExists('results');
    }
}
