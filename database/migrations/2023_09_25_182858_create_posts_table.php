<?php

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TB_POSTS, function (Blueprint $table) {
            $table->id();

            $table->foreignId(COL_POST_USER_ID)->constrained()->cascadeOnDelete();
            $table->foreignId(COL_POST_TOPIC_ID)->constrained()->cascadeOnDelete();

            $table->string(COL_POST_TITLE, 128)->nullable();
            $table->string(COL_POST_SLUG, 128)->nullable();
            $table->string(COL_POST_THUMBNAIL, 128)->nullable();
            $table->text(COL_POST_CONTENT)->nullable();
            $table->enum(COL_POST_STATUS, [PostStatus::PUBLISHED->value, PostStatus::UNPUBLISHED->value])->default(PostStatus::UNPUBLISHED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TB_POSTS);
    }
};
