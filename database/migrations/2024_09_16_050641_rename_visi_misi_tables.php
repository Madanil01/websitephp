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
        // Schema::rename('visi', 'visis');
        Schema::rename('misi', 'misis');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::rename('visi', 'old_visi_table_name');
        Schema::rename('misi', 'old_misi_table_name');
    }
};
