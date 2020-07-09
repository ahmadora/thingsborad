<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('additional_info')->nullable()->default('null');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('region')->nullable();
            $table->string('search')->nullable();
            $table->string('title')->nullable();
            $table->string('zip')->nullable();
            $table->string('tenantId');

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
        Schema::dropIfExists('customers');
    }
}
