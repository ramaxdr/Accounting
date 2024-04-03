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
        Schema::create('customer_supplier_group', function (Blueprint $table) {
            $table->id();
            $table->string('group_code');
            $table->string('coa_code');
            $table->string('coa_name');
            $table->string('group_name');
            $table->string('group_description');
            $table->enum('group_status', ['active', 'not active']);
            $table->foreignId('modul_code')->references('id')->on('modul_form');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_supplier_group');
    }
};
