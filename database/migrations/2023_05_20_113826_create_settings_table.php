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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('show')->default(1);
            $table->tinyInteger('save_contact_message')->default(0);
            $table->tinyInteger('comment_type')->default(1);
            $table->tinyInteger('preloader')->default(1);
            $table->string('preloader_image')->nullable();
            $table->tinyInteger('allow_cookie_consent')->default(0);
            $table->text('cookie_text')->nullable();
            $table->string('cookie_button_text')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
