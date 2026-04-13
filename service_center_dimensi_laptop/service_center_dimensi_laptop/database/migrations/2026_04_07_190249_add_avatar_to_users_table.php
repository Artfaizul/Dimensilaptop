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
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom avatar untuk simpan nama file foto profil
            $table->string('avatar')->nullable()->after('email'); 
            
            // Menambah kolom status untuk fitur Aktif/Tidak Aktif di profil
            $table->string('status')->default('aktif')->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom jika migration di-rollback
            $table->dropColumn(['avatar', 'status']);
        });
    }
};