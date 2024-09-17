<?php

use App\Models\Author;
use App\Models\Order;
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
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Author::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(Order::class)->constrained()->restrictOnDelete();
            $table->double('pre_balance');
            $table->double('amount');
            $table->double('after_balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
