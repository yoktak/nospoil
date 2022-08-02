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
                'body'=>'Amazing'
            ],
            [
                'body'=>'Good'
            ],
            [
                'body'=>'Fantastic'
            ],
            [
                'body'=>'Nice'
            ]
        ]);
    }
}
