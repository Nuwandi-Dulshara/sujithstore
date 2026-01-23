<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // remove old discount_price column if exists
            if (Schema::hasColumn('products', 'discount_price')) {
                $table->dropColumn('discount_price');
            }

            // add discount_percentage as nullable integer
            if (! Schema::hasColumn('products', 'discount_percentage')) {
                $table->integer('discount_percentage')->nullable()->after('price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'discount_percentage')) {
                $table->dropColumn('discount_percentage');
            }

            if (! Schema::hasColumn('products', 'discount_price')) {
                $table->decimal('discount_price', 10, 2)->nullable()->after('price');
            }
        });
    }
};
