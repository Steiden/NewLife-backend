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
            $table->string('second_name', 50)->change();
            $table->string('first_name', 50)->change();
            $table->string('patronymic', 50)->change();
            $table->string('telephone', 11)->change();
            $table->string('email', 50)->change();
            $table->string('login', 25)->change();
            $table->string('password', 64)->change();
            $table->boolean('is_banned');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->softDeletes();
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
