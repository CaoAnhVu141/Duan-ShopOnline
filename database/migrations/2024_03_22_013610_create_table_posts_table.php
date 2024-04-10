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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('namepost');
            $table->string('maincontent', 10000);
            $table->string('author', 200);
            $table->string('status', 200);
            //tạo khóa ngoại
            $table->unsignedBigInteger('id_cate');
            $table->foreign('id_cate')->references('id')->on('articlecategory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
