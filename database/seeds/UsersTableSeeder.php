<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();

      $name = [
        '山田一郎', '山田二郎', '山田三郎', '山田四郎', '山田五郎'
      ];

      $email = [
        'fish1@gmail.com', 'fish2@gmail.com', 'fish3@gmail.com', 'fish4@gmail.com', 'fish5@gmail.com'
      ];

      $password = [
        'passWord1', 'passWord2', 'passWord3', 'passWord4', 'passWord5'
      ];

      $post = [
        '1010101', '2020202', '3030303', '4040404', '5050505'
      ];

      $address =[
        '大阪府大阪市上本町1-1', '大阪府大阪市上本町1-2', '大阪府大阪市上本町1-3', '大阪府大阪市上本町1-4', '大阪府大阪市上本町1-5',
      ];

      for($i = 0; $i < 5; $i++) {
        DB::table('users')->insert([
          'name' => $name[$i],
          'email' => $email[$i],
          'password' => bcrypt($password[$i]),
          'post' => $post[$i],
          'address' => $address[$i],
          'created_at' => time(),
          'updated_at' => time()
        ]);
      }

    }
}
