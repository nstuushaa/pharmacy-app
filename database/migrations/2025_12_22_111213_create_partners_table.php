<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Название партнёра
            $table->string('logo');          // Имя файла: vtb.svg
            $table->string('url')->nullable(); // Ссылка (опционально)
            $table->integer('position')->default(0); // Для сортировки
            $table->boolean('is_active')->default(true); // Показывать или нет
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};