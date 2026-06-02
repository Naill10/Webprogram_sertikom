<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('complaints')->where('status', 'dalam_proses')->update(['status' => 'proses']);
        DB::statement("ALTER TABLE complaints MODIFY COLUMN status ENUM('masuk','proses','selesai','ditolak') NOT NULL DEFAULT 'masuk'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('complaints')->where('status', 'proses')->update(['status' => 'dalam_proses']);
        DB::statement("ALTER TABLE complaints MODIFY COLUMN status ENUM('masuk','dalam_proses','selesai','ditolak') NOT NULL DEFAULT 'masuk'");
    }
};
