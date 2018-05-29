<?php

use Illuminate\Database\Seeder;
use App\Models\Goods;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 生成商品数据集合
        $goods = factory(Goods::class)->times(5)->make();

        // 将数据集合转换为数组，并插入到数据库中
        Goods::insert($goods->toArray());
    }
}
