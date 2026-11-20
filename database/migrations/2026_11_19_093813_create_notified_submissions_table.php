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
        Schema::create('notified_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('source');                    // mis. 'mac_reimbust'
            $table->unsignedBigInteger('source_id');
            $table->timestamps();
            $table->unique(['source', 'source_id']);     // cegah pencatatan ganda
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notified_submissions');
    }
};
