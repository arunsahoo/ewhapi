<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OrderID')->foreign('OrderID')->references('id')->on('orders');
            $table->string('InvoiceName');
            $table->date('InoviceDate');
            $table->float('TotalAmount', 8, 2);
            $table->string('Notes');
            $table->float('TotalTax', 8, 2);
            $table->integer('Status');
            $table->float('BalanceDue', 8, 2);
            $table->date('DueDate');
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
        Schema::dropIfExists('invoices');
    }
}
