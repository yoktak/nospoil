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
                'email'=>'yokocchibb@yahoo.co.jp',
                'password'=>'Very10tt'
            ]
            ]);
        
        
        $users = factory(App\User::class, 9)->create();
    }
}
