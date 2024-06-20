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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('名稱');
            $table->string('code', 50)->comment('代碼');
            $table->decimal('exchange', 16, 10)->default(1)->comment('匯率');
            $table->unsignedTinyInteger('unit_price_float')->default(1)->comment('單價位數');
            $table->unsignedTinyInteger('price_float')->default(1)->comment('金額位數');
            $table->text('remark')->nullable()->comment('備註');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->comment('幣別');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
