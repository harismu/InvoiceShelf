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
        Schema::table('items', function (Blueprint $table) {
            $table->decimal('govt_fee', 15, 2)->default(0)->after('price');
        });

        // Also add to invoice_items (the snapshot table used on saved invoices)
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->decimal('govt_fee', 15, 2)->default(0)->after('price');
        });

        // Same for estimate_items if you use estimates
        Schema::table('estimate_items', function (Blueprint $table) {
            $table->decimal('govt_fee', 15, 2)->default(0)->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', fn($t) => $t->dropColumn('govt_fee'));
        Schema::table('invoice_items', fn($t) => $t->dropColumn('govt_fee'));
        Schema::table('estimate_items', fn($t) => $t->dropColumn('govt_fee'));
    }
};
