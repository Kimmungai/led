<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('sale_id')->unsigned()->index()->nullable();
            $table->integer('purchase_id')->unsigned()->index()->nullable();
            $table->string('name')->nullable();
            $table->text('notes')->nullable();
            $table->double('amount')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('recipient')->nullable();
            $table->text('send_to')->nullable();
            $table->datetime('dueDate')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('reports');
    }
}
