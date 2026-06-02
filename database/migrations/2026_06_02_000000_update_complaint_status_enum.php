<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('complaints')->where('status', 'pending')->update(['status' => 'masuk']);
        DB::table('complaints')->where('status', 'in_progress')->update(['status' => 'proses']);
        DB::table('complaints')->where('status', 'resolved')->update(['status' => 'selesai']);

        DB::statement("ALTER TABLE complaints MODIFY COLUMN status ENUM('masuk','proses','selesai','ditolak') NOT NULL DEFAULT 'masuk'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('complaints')->where('status', 'masuk')->update(['status' => 'pending']);
        DB::table('complaints')->where('status', 'proses')->update(['status' => 'in_progress']);
        DB::table('complaints')->where('status', 'selesai')->update(['status' => 'resolved']);

        DB::statement("ALTER TABLE complaints MODIFY COLUMN status ENUM('pending','in_progress','resolved') NOT NULL DEFAULT 'pending'");
    }
};
