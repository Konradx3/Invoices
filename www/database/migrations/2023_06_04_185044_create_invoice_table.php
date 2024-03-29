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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('invoice_number', 50);
            $table->date('invoice_date');
            $table->string('company_name')->nullable();
            $table->string('nip', 30)->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code', 100)->nullable();
            $table->enum('payment_method', Invoice::getAvailablePaymentMethod());
            $table->string('paid')->default(0);
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
