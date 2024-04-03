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
        Schema::create('journal_type', function (Blueprint $table) {
            $table->id();
            $table->string('id_journal_type');
            $table->string('journal_type_name');
            $table->string('journal_type_desc');
            $table->enum('journal_type_status', ['active', 'not active']);
            $table->foreignId('id_modul')->references('id')->on('modul_form');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_type');
    }
};
