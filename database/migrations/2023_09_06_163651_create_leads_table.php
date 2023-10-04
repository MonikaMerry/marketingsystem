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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile_number');
            $table->string('district')->nullable();
            $table->string('language')->nullable();
            $table->string('status')->default('pending');
            $table->string('active_date_time')->nullable();
            $table->string('source_type')->nullable();
            $table->string('source_value')->nullable();
            $table->string('last_contact_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
