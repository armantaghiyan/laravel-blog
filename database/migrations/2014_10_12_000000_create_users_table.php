<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TB_USERS, function (Blueprint $table) {
            $table->id();
            $table->string(COL_USER_NAME, 128)->nullable();
            $table->string(COL_USER_EMAIL)->unique();
            $table->string(COL_USER_USERNAME)->unique();
            $table->string(COL_USER_AVATAR, 128)->nullable();
            $table->timestamp(COL_USER_EMAIL_VERIFIED_AT)->nullable();
            $table->string(COL_USER_PASSWORD);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TB_USERS);
    }
};
