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
        Schema::create('lead_comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->bigInteger('leads_id');
            $table->bigInteger('users_id');
            $table->timestamps();

            $table->foreign('leads_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('users_id')->reference('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_comments');
    }
};