<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->string('brand', 30)->nullable();
            $table->integer('price');
            $table->text('description');
            $table->enum('condition', ['like_new', 'good', 'fair', 'poor']);
            $table->enum('category', ['fashion', 'electronics', 'interior', 'ladies', 'mens', 'cosmetics', 'books', 'game', 'sports', 'kitchen', 'handmade', 'accessories', 'toys', 'kids']);
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
