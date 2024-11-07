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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('short_code', 10)->unique();  // Unique short code
            $table->text('original_url');  // Original long URL
            $table->timestamp('created_at')->useCurrent();  // Created timestamp
            $table->timestamp('expiration_date')->nullable();  // Optional expiration date
            $table->unsignedInteger('click_count')->default(0);  // Click count


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_links');
    }
};
