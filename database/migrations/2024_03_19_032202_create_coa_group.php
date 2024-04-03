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
        Schema::create('coa_group', function (Blueprint $table) {
            $table->id();
            $table->string('coa_group_code');
            $table->string('coa_group_name');
            $table->enum('coa_mutation', ['debet', 'credit']);
            $table->enum('coa_report', ['balance', 'income']);
            $table->enum('coa_status', ['active', 'not active']);
            $table->foreignId('id_modul')->references('id')->on('modul_form');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa_group');
    }
};
