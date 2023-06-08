<?php

use App\Models\Invoice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('invoice_number', 20);
            $table->string('company_name');
            $table->string('nip');
            $table->string('address');
            $table->string('palce_number');
            $table->string('zip_code');
            $table->string('country');
            $table->string('place');
            $table->string('payment_method');
            $table->enum('status', Invoice::getAvailableStatuses());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
};