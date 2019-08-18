<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIreportInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ireport_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ireport_id')->unsigned()->index()->nullable();
            $table->integer('invoice_id')->unsigned()->index()->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('invoice_date_1')->nullable();
            $table->string('recipient')->nullable();
            $table->double('amount')->nullable();
            $table->double('totalAmount')->nullable();
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
        Schema::dropIfExists('ireport_invoices');
    }
}
