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
        Schema::create('document_format', function (Blueprint $table) {
            $table->id();
            $table->string('doc_num_code');
            $table->string('modul_code');
            $table->string('modul_name');
            $table->string('doc_num_name');
            $table->integer('start_number');
            $table->string('format');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_format');
    }
};
