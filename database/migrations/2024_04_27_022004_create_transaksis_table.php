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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->bigInteger('pembelis_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->double('total');
            $table->timestamps();
        });
		
Schema::table('transaksis',function(Blueprint $table){
            $table->foreign('pembelis_id')->references('id')->on('pembelis')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropForeign('transaksis_pembelis_id_foreign');
        });

        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropIndex('transaksis_pembelis_id_foreign');
        });

        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropForeign('transaksis_users_id_foreign');
        });

        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropIndex('transaksis_users_id_foreign');
        });
              
        Schema::dropIfExists('transaksis');
    }
};
