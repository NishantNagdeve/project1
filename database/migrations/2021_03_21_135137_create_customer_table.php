<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustomer', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 120)->nullable();
            $table->string('ph_no', 10)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('gender', 6)->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblCustomer');
    }
}
