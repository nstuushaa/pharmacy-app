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
        Schema::create('reviews_pharmacy', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);           
            $table->string('email')->nullable();  
            $table->tinyInteger('rating')->unsigned()->checkBetween([1, 5]); 
            $table->text('comment')->nullable();  
            $table->boolean('is_approved')->default(false);
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews_pharmacy');
    }
};
