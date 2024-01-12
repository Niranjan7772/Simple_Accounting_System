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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('from_acc_id');

            $table->foreignId('to_acc_id');

            $table->date('date');

            $table->decimal('amount', 10, 2);

            $table->text('description')->nullable();



            $table->timestamps();



            $table->foreign('from_acc_id')->references('id')->on('accounts');

            $table->foreign('to_acc_id')->references('id')->on('accounts');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
