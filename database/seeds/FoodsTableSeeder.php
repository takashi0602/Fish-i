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
        'とうふちくわ', 'ネギ入りとうふちくわ', '野焼きちくわ', '竹付きちくわ', '白ちくわ', 'あごちくわ'
      ];

      $description = [
        'とうふちくわ...',
        'ネギ入りとうふちくわ...',
        '野焼きちくわは...',
        '竹付きちくわは...',
        '白ちくわは...',
        'あごちくわは...'
      ];

      $price = [
        '180', '200', '150', '150', '180', '700'
      ];

      $img = [
        'http://placehold.it/300/?text=fish%20paste1', 'http://placehold.it/300/?text=fish%20paste2',
        'http://placehold.it/300/?text=fish%20paste3', 'http://placehold.it/300/?text=fish%20paste4',
        'http://placehold.it/300/?text=fish%20paste5', 'http://placehold.it/300/?text=fish%20paste6'
      ];

      for($i = 0; $i < 6; $i++) {
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
