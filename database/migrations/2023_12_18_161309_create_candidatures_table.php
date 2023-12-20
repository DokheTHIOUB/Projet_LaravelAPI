<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 
use App\Models\Formation; 
use App\Models\User; 


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Formation::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('statut',['accepter','refuser'])->default('accepter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
