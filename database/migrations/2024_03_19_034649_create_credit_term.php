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
    Schema::create('credit_term', function (Blueprint $table) {
        $table->id();
        $table->string('credit_term_code');
        $table->string('credit_term_name');
        $table->integer('credit_term_value');
        $table->enum('credit_term_status', ['active', 'not active']);
        $table->unsignedBigInteger('id_modul');
        $table->foreign('id_modul')->references('id')->on('modul_form');
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_term');
    }
};
