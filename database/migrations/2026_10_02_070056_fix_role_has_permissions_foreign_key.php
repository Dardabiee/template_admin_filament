<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('role_has_permissions', function (Blueprint $table) {
            // 1. Drop foreign key lama yang mengarah ke tbl_userlevel
            $table->dropForeign('role_has_permissions_role_id_foreign');

            // 2. Buat foreign key baru yang mengarah ke tabel roles bawaan Spatie
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::enableForeignKeyConstraints();
    }
};