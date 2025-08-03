<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('email', 80)->unique();
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();
        });

        // Roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
        });

        // Menus table
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 80)->nullable();
            $table->string('route', 80)->nullable();
            $table->string('icon', 80)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menus')->nullOnDelete();
            $table->index('title', 'idx_menus_title');
            $table->index('route', 'idx_menus_route');
        });

        // user_roles table
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
        });

        // role_menu_access table
        Schema::create('role_menu_access', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->primary(['role_id', 'menu_id']);
        });

        // user_menu_access table
        Schema::create('user_menu_access', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->primary(['user_id', 'menu_id']);
        });

        // password_reset_tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255)->primary();
            $table->string('token', 255);
            $table->timestamp('created_at')->nullable();
        });

        // password_resets table (legacy support)
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 255)->index();
            $table->string('token', 255);
            $table->timestamp('created_at')->nullable();
        });

        // personal_access_tokens table
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['tokenable_type', 'tokenable_id'], 'tokenable_type_tokenable_id_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('user_menu_access');
        Schema::dropIfExists('role_menu_access');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
    }
};
