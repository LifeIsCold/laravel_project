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
    
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('author_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('content'); // TEXT for blog content
        $table->text('excerpt')->nullable();
        $table->string('featured_image')->nullable();
        $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
        $table->enum('visibility', ['public', 'private', 'password_protected'])->default('public');
        $table->integer('view_count')->default(0);
        $table->integer('like_count')->default(0);
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
