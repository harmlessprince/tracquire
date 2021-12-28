<?php

use App\Helper\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->char('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->fulltext();
            $table->dateTime('published_at')->index()->nullable();
            $table->text('condition')->nullable();
            $table->boolean('shoot_able')->default(false)->index();
            $table->string('portfolio_link')->nullable();
            $table->decimal('latitude', 11,8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable()->index();
            $table->integer('status')->default(PostStatus::OPEN);
            $table->softDeletes();
//            $table->index(['title', 'published_at ', 'shoot_able', 'slug', 'country', 'state', 'city', 'location']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
