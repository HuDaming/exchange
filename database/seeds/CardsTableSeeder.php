<?php

use Illuminate\Database\Seeder;
use App\Models\Goods;
use App\Models\Card;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
            卡密状态：
            0 新卡；
            1 已兑换（电玩商城）
            2 已刮开（电玩商城）；
            3 已登记（5U）；
            4 已出货（交易平台）；
            99 已回收（5U）
         */
        static $status = ['0', '1', '2', '3', '4', '99'];

        // 获取商品 ID 数组，值如：[1, 2, 3, 4]
        $goods_ids = Goods::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 生成卡密数据集合
        $cards = factory(Card::class)
                        ->times(1000)
                        ->make()
                        ->each(function ($card, $index)
                            use ($faker, $goods_ids, $status)
        {
            $card->goods_id = $faker->randomElement($goods_ids);
            $card->status = $faker->randomElement($status);
        });

        // 将卡密数据集合转化为数组，并插入数据库
        Card::insert($cards->toArray());
    }
}
