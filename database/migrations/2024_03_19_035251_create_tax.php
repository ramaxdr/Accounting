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
        Schema::create('tax', function (Blueprint $table) {
            $table->id();
            $table->string('tax_code');
            $table->string('input_coa_code');
            $table->string('input_coa_name');
            $table->string('output_coa_code');
            $table->string('output_coa_name');
            $table->string('tax_name');
            $table->string('tax_desc');
            $table->integer('tax_percentage');
            $table->integer('tax_method');
            $table->enum('tax_status', ['active', 'not active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax');
    }
};
