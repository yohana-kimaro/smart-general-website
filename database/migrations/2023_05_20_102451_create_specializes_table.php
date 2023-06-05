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
        Schema::create('specializes', function (Blueprint $table) {
            $table->id();
            $table->text('header');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('added_by')->nullable();
            $table->text('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializes');
    }
};
