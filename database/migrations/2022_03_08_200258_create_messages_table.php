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
            $table->foreignId('conversation_id')->onDeleteCascade();
            $table->foreignId('sender_id')->constrained('users', 'id')->onDeleteCascade();
            $table->text('message');
            $table->string('file')->nullable();
            $table->text('meta')->nullable();
            $table->foreignId('deleted_user_id')->nullable()->constrained('users', 'id');
            $table->dateTime('read_at')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
