<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->foreignId('complaint_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();

            $table->string('type');
            $table->string('street_avenue');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->string('cep');

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
        Schema::dropIfExists('addresses');
    }
}
