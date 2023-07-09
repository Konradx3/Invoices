<?php

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
        Schema::create('items_for_invoice', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('product_name');
            $table->decimal('unit_net', 10, 2);
            $table->float('vat');
            $table->decimal('unit_gross', 10, 2);
            $table->float('quantity');
            $table->decimal('sum_net', 10, 2);
            $table->decimal('sum_gross', 10, 2);
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
        Schema::dropIfExists('items_for_invoice');
    }
};
