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
    
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id')->constrained()->onDelete('cascade');
        $table->foreignId('author_id')->nullable()->constrained()->onDelete('set null');
        $table->string('guest_name')->nullable();
        $table->string('guest_email')->nullable();
        $table->text('content'); // TEXT for comment content
        $table->enum('status', ['pending', 'approved', 'spam', 'trash'])->default('pending');
        $table->integer('upvotes')->default(0);
        $table->integer('downvotes')->default(0);
        $table->timestamp('approved_at')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
