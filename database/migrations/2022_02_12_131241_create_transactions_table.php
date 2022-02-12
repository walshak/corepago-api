<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->boolean('abandoned')->default(false);
            $table->string('address');
            $table->string('amount');
            $table->string('bip125-replaceable')->default('no');
            $table->integer('category_id');
            $table->string('category');
            $table->integer('confirmations')->nullable();
            $table->string('fee');
            $table->string('label')->nullable();
            $table->integer('time');
            $table->integer('timereceived');
            $table->boolean('trusted')->default(true);
            $table->string('txid');
            $table->integer('vout');
            $table->json('walletconflicts')->nullable();
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('transactions');
    }
}
