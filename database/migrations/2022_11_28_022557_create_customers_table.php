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

            $table->string("contact");
            $table->string("email");
            $table->string("code_country");
            $table->string("phone_number");
            $table->string("phone_number_secondary")->nullable();

            $table->boolean("active");    
            $table->string("address");
            $table->string("number");
            $table->string("colony");
            $table->string("city");
            $table->string("state");
            $table->integer("zip");
            $table->string("complete_address");
            $table->string("geoCoord");
            $table->string("address_secondary")->nullable();
            
            $table->string("type");
            $table->float("credit_limit");

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
