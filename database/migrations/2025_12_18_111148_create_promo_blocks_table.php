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
        Schema::create('promo_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // например: 'main_left', 'main_right'
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->default('ПЕРЕЙТИ В КАТАЛОГ');
            $table->string('button_url'); // например: '/catalog/oral-care'
            $table->string('image'); // имя файла: oral-b.svg
            $table->string('background_color'); // например: '#27AE60' или 'gradient'
            $table->boolean('is_active')->default(true);
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_blocks');
    }
};
