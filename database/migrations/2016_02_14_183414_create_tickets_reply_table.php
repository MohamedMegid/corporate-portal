<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reply');
            $table->integer('user_id');
            $table->integer('ticket_id')->references('id')->on('tickets')->onDelete('cascade')
            
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
        Schema::drop('tickets_reply');
    }
}
