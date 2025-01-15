<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToUsersStocksTable extends Migration
{
    public function up()
    {
        Schema::table('users_stocks', function (Blueprint $table) {
            $table->integer('quantity')->default(1)->after('stockId');
        });
    }

    public function down()
    {
        Schema::table('users_stocks', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}
