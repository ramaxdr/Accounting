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
        Schema::create('supplier_type', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_type_code');
            $table->string('supplier_type_name');
            $table->string('supplier_type_desc');
            $table->enum('supplier_type_status', ['active', 'not active']);
            $table->foreignId('modul_code')->references('id')->on('modul_form');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_type');
    }
};
