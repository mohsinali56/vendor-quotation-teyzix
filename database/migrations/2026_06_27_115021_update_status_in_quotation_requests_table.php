<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        // 1. Pehle saara kharab data 'draft' kar do
        DB::statement("UPDATE quotation_requests SET status = 'draft' WHERE status NOT IN ('draft', 'open', 'sent', 'closed') OR status IS NULL");
        
        // 2. Ab column update karo
        DB::statement("ALTER TABLE quotation_requests MODIFY status ENUM('draft','open','sent','closed') NOT NULL DEFAULT 'draft'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE quotation_requests MODIFY status ENUM('draft','open') NOT NULL DEFAULT 'draft'");
    }
};
