<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Goods::class, function (Faker $faker) {

    // 生成一个5位随机数，左侧补 0
    $goods_no = str_pad(random_int(1, 99999), 5, 0, STR_PAD_LEFT);

    $storage = random_int(350, 550); // 实际库存
    $opening_storage = $storage * 0.85;  // 开放库存

    // 取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 商品添加时间永远早于更新时间
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'goods_no' => $goods_no,
        'name' => $faker->sentence(),
        'opening_price' => random_int(50, 999),
        'storage' => $storage,
        'opening_storage' => $opening_storage,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
