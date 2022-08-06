<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'body'=>'Amazing',
                'users_id'=>1,
                'comics_id'=>1
            ],
            [
                'body'=>'Good',
                'users_id'=>2,
                'comics_id'=>1
            ],
            [
                'body'=>'Fantastic',
                'users_id'=>3,
                'comics_id'=>1
            ],
            [
                'body'=>'Nice',
                'users_id'=>4,
                'comics_id'=>2
            ]
        ]);
    }
}
