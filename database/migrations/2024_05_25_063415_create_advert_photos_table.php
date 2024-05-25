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
        Schema::create('advert_photos', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255)->change();
            $table->unsignedBigInteger('advert_id');
            $table->timestamps();

            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advert_photos');
    }
};
