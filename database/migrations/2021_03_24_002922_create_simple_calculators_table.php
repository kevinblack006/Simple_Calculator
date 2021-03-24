<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpleCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simple_calculators', function (Blueprint $table) {
            $table->id();
            $table->integer('Input1');
            $table->integer('Input2');
            $table->char('Operand',8);
            $table->double('Result',16,4);
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
        Schema::dropIfExists('simple_calculators');
    }
}
