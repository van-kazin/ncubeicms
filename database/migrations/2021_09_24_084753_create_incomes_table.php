<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->integer('incomegroup_id');
            $table->integer('membership_id');
            $table->date('date');
            $table->integer('user_id');
            $table->text('description');
            $table->text('payment_mode');
            $table->double('amount', 8, 2);
            $table->double('input_amount', 8, 2);
            $table->text('currency');
            $table->double('rate', 3, 2);
            $table->text('bank_name')->nullable();
            $table->text('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
