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
        // 1. Matikan pengecekan Foreign Key sementara
        Schema::disableForeignKeyConstraints();

        // 2. Hapus kolom userlevel_id dari tabel users jika ada
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'userlevel_id')) {
                $table->dropColumn('userlevel_id');
            }
        });

        // 3. Hapus tabel tbl_userlevel
        Schema::dropIfExists('tbl_userlevel');

        // 4. Nyalakan kembali pengecekan Foreign Key
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('tbl_userlevel', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('userlevel_id')->nullable();
        });
    }
};