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
        Schema::table('events', function (Blueprint $table) {
//            $table->foreignId('category_id')->after('id');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');

        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
        Schema::table('groups', function (Blueprint $table) {
            //
        });
    }
};
