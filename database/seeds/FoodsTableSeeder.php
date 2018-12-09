<?php

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Food::truncate();

      $name = [
        '豆腐ちくわ', 'ネギ入り豆腐ちくわ', '竹ちくわ', '白ちくわ', 'あごちくわ'
      ];

      $description = [
        '江戸時代から続く鳥取の伝統の味です。鳥取県産大豆を使用した木綿豆腐を７０％、白身魚を３０％使用しています。',
        'とうふちくわにネギを混ぜ込んだちくわです。とうふちくわとネギとの相性は絶品で、一口食べると口の中いっぱいにネギの風味が広がります。',
        '天然の竹を用い、こんがりと色良く焼きあげいます。平安時代末期から食べられており、竹付きのままかじりつく食べ方が最高です。',
        'スケトウダラを原料としたちくわです。焼き色を付けずに仕上げ、皮がやわらかく、肉厚です。',
        '新鮮なとびうおを原料としたちくわです。わさび醤油をつけて食べるとまた違った味が楽しめます。'
      ];

      $price = [
        '180', '200', '130', '180', '600'
      ];

      $img = [
        'image1', 'image2', 'image3', 'image4', 'image5'
      ];

      for($i = 0; $i < 5; $i++) {
        DB::table('foods')->insert([
          'name' => $name[$i],
          'description' => $description[$i],
          'price' => $price[$i],
          'img' => $img[$i],
          'created_at' => time(),
          'updated_at' => time()
        ]);
      }
    }
}
