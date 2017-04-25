<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
       $users = json_decode(file_get_contents(database_path().'/data/users.json'));

       foreach ($users as $user) {
           User::create([
              'name' => $user['name'],
              'email' => $user['email'],
           ]);
       }
   }
}
