<?php

use App\Enums\LikeType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TB_LIKES, function (Blueprint $table) {
            $table->id();
            $table->foreignId(COL_LIKE_USER_ID)->constrained()->cascadeOnDelete();
            $table->bigInteger(COL_LIKE_TARGET_ID);
            $table->enum(COL_LIKE_TARGET_TYPE, [LikeType::POST->value]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TB_LIKES);
    }
};
