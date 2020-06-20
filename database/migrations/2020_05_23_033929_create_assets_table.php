<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('itemNo');
            $table->string('barcode');
            $table->string('description');
            $table->string('more_description');
            $table->date('date_purchased');
            $table->date('date_capitalised');
            $table->integer('quantity');
            $table->float('purchase_cost');
            $table->float('life_in_years');
            $table->float('depreciation_percentage');
            $table->float('maintenance');
            $table->float('asset_value');
            $table->string('category');
            $table->string('status');
            $table->string('account_code');
            $table->string('mda');
            $table->string('location');
            $table->string('office');
            $table->unsignedBigInteger('custodian_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('dispose_id')->nullable();
            $table->unsignedBigInteger('reassigned')->nullable();
            $table->timestamps();


            $table->index('custodian_id');
            $table->index('user_id');
            $table->index('dispose_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
