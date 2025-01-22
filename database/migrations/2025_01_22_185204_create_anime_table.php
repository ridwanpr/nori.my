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
        Schema::create('anime', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('slug', 50);
            $table->string('image', 100);
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->string('studio', 50);
            $table->string('year', 10)->nullable();
            $table->string('duration', 10)->nullable();
            $table->text('synopsis');

            $table->timestamps();
        });

        Schema::create('anime_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('anime_id')->references('id')->on('anime')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });

        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id');
            $table->string('ep_number', 20);
            $table->string('ep_title', 150)->nullable();
            $table->string('ep_slug', 50);
            $table->text('content');

            $table->foreign('anime_id')->references('id')->on('anime')->onDelete('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('user_id');
            $table->text('content');

            $table->foreign('anime_id')->references('id')->on('anime')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating');

            $table->foreign('anime_id')->references('id')->on('anime')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('anime_id')->references('id')->on('anime')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('episodes');
        Schema::dropIfExists('anime_genres');
        Schema::dropIfExists('anime');
    }
};
