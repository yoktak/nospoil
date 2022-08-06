<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Takumi Yokochi',
                'email'=>'yokotaku327@gmail.com',
                'password' => Hash::make('secret'),
            ]
            ]);
        
        
        $users = factory(App\User::class, 9)->create();
    }
}
