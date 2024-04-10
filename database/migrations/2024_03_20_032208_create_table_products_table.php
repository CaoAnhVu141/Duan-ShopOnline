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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nameproduct',200);
            $table->bigInteger('price');
            $table->string('image',200);
            $table->string('producer',200);
            $table->string('rightnow',200);
            $table->string('productdescription',300);
            $table->string('detailproductdescription',300);
            $table->string('neworold',200);
            //tao khoa ngoai
            $table->unsignedBigInteger('id_cate');
            $table->foreign('id_cate') -> references('id') -> on('caterogies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
