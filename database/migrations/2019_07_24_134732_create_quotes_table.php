<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->text('addresse')->nullable();
            $table->string('date')->nullable();
            $table->string('note')->nullable();
            $table->text('foot_note_1')->nullable();
            $table->text('foot_note_2')->nullable();
            $table->text('foot_note_3')->nullable();
            $table->text('foot_note_4')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
