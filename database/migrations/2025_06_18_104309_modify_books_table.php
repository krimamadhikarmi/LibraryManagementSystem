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
        Schema::table('books', function (Blueprint $table) {
            // Change price to decimal(8, 2)
            $table->integer('price')->change();
            $table->longText('description')->change();
            $table->integer('quantity')->change();

            // Example: Change description to longText
            // $table->longText('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Revert price to integer (or previous type)
            $table->string('price');
            $table->string('description');
            $table->string('quantity');
        });
    }
};
