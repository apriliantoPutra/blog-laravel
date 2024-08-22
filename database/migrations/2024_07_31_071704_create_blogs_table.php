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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            // menghubungkan kolom user_id(tabel blogs) ke id dari tabel users
            // cara 1
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // cara 2
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'blogs_user_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'blogs_category_id'
            );

            $table->string('judul_blog');
            $table->text('isi_blog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
