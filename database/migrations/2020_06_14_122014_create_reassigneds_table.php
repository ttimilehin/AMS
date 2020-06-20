<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReassignedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reassigneds', function (Blueprint $table) {
            $table->id();
            $table->integer('asset_id');
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
        Schema::dropIfExists('reassigneds');
    }
}
