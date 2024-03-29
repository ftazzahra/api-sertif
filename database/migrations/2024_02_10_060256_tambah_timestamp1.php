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
        Schema::table('tbl_walas', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tbl_ptk', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('tbl_tahun_ajaran', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_walas', function (Blueprint $table) {
            //
        });
    }
};
