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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phonenumber')->nullable();
            $table->string('image')->nullable();
            $table->string('email_verified_token')->nullable();
            $table->string('email_verified')->default(0);
            $table->string('forget_password_token')->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->text('banner_image')->nullable();
            $table->tinyInteger('is_admin')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
