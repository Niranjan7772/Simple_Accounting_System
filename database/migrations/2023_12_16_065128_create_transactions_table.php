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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('reference_type')->comment('0: Transfer, 1: Expense,2: Invoice');
            $table->unsignedBigInteger('reference_id');
            $table->unsignedBigInteger('acc_id');
            $table->decimal('amount', 10, 2);
            $table->tinyInteger('type')->comment('0: Debit, 1: Credit');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('acc_id')->references('id')->on('accounts')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
