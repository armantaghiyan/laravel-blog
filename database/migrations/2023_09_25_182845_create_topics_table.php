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
        Schema::create(TB_TOPICS, function (Blueprint $table) {
            $table->id();
            $table->string(COL_TOPIC_TITLE, 128);
            $table->string(COL_TOPIC_SLUG, 128);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TB_TOPICS);
    }
};
