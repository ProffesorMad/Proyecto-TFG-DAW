<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('random_builds', function (Blueprint $table)
        {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreignId('champion_id')->constrained()->onDelete('cascade');

            $table->string('lane');

            $table->json('items');

            $table->json('spells');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('random_builds');
    }
};
