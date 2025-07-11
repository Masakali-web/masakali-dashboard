<?php

use App\Enums\MeasureUnitEnum;
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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_id')->constrained();
            $table->decimal('cost', 10, 2)->default(0.00);
            $table->decimal('quantity', 10, 2)->default(1.00);
            $table->enum('measure_unit', MeasureUnitEnum::keys())->nullable();
            $table->string('notes')->nullable();
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
