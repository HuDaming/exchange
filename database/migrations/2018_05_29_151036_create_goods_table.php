<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_no')->index()->comment('商品编号（对应交易所平台商品编号）');
            $table->string('name')->index()->comment('商品名称');
            $table->unsignedInteger('opening_price')->default(0)->comment('开盘价');
            $table->unsignedInteger('storage')->default(0)->comment('实际库存');
            $table->unsignedInteger('opening_storage')->default(0)->comment('开放库存');
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
        Schema::dropIfExists('goods');
    }
}
