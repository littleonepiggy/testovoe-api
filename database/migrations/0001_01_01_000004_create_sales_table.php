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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->datetime('date');
            $table->datetime('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->string('total_price');
            $table->integer('discount_percent')->nullable();
            $table->boolean('is_supply')->nullable();
            $table->boolean('is_realization')->nullable();
            $table->string('promo_code_discount')->nullable();
            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');
            $table->integer('income_id');
            $table->integer('sale_id')->nullable();
            $table->integer('odid')->nullable();
            $table->integer('spp');
            $table->string('for_pay');
            $table->string('finished_price');
            $table->string('price_with_disc');
            $table->integer('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->boolean('is_storno')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
