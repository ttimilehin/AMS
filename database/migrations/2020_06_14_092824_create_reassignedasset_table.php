<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReassignedassetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reassignedasset', function (Blueprint $table) {
            $table->id();
            $table->string('itemNo');
            $table->string('description');
            $table->string('mda');
            $table->string('former_custodian')->nullable();
            $table->string('present_custodian')->nullable();
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
        Schema::dropIfExists('reassignedasset');
    }
}
