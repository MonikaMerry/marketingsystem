<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages_sends', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('message_template_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lead_id')->unsigned();
            $table->timestamps();

            $table->foreign('message_template_id')->references('id')->on('message_templates')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_sends');
    }
};
