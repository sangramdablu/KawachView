<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hire_developer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('company', 150)->nullable();
            $table->string('email', 254);
            $table->string('phone', 20)->nullable();
            $table->string('developer_type', 150);
            $table->string('developer_slug', 150);
            $table->string('engagement_type', 50)->nullable();
            $table->string('team_size', 20)->nullable();
            $table->string('budget', 20)->nullable();
            $table->text('description');
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->timestamps();

            $table->index('developer_slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hire_developer_requests');
    }
};
