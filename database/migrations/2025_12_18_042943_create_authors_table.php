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
        // database/migrations/xxxx_create_authors_table.php
    Schema::create('authors', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('full_name');
        $table->string('email')->unique();
        $table->text('bio')->nullable(); // Changed to TEXT
        $table->string('profile_image')->nullable();
        $table->enum('account_type', ['basic', 'premium', 'admin'])->default('basic');
        $table->boolean('is_verified')->default(false);
        $table->timestamp('last_login_at')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
