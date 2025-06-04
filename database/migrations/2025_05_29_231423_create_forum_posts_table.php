<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('forum_posts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');

        $table->string('title_en');
        $table->string('title_fr');
        $table->text('content_en');
        $table->text('content_fr');

        $table->timestamp('published_at')->useCurrent();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_posts');
    }
};
