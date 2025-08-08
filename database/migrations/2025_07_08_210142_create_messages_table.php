<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('sender_type');
            $table->unsignedBigInteger('sender_id');
            $table->string('receiver_type');
            $table->unsignedBigInteger('receiver_id');
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->index(['sender_type', 'sender_id']);
            $table->index(['receiver_type', 'receiver_id']);
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
        Schema::dropIfExists('messages');
    }
}
