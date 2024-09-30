<?php

use App\Models\Author;
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
        Schema::create('authors_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Author::class)->constrained()->cascadeOnDelete();
            $table->enum('type', ['blog', 'podcast']);
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->string('video')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_blogs');
    }
};
