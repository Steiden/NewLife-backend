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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->change();
            $table->string('description', 500)->change();
            $table->unsignedBigInteger('animal_type_id');
            $table->unsignedBigInteger('advert_address_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('advert_status_id');
            $table->timestamps();

            $table->foreign('animal_type_id')->references('id')->on('animal_types');
            $table->foreign('advert_address_id')->references('id')->on('advert_addresses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('advert_status_id')->references('id')->on('advert_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
