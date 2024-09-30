<?php

use App\Models\AuthorsBlog;
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
        Schema::create('authors_blog_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AuthorsBlog::class)->constrained()->cascadeOnDelete();
            $table->enum('user_type', ['user', 'author']);
            $table->unsignedBigInteger('user_id');
            $table->longText('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_blog_comments');
    }
};
