<?php

use Illuminate\Database\Seeder;

class ComicUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comic_user')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'comic_id' => 1,
                'type' => 1,
                'episode' => 1056
            ],
            [
                'id' => 2,
                'user_id' =>1 ,
                'comic_id' => 1,
                'type' => 0,
                'episode' => 103
            ],
            [
                'id' => 3,
                'user_id' =>1 ,
                'comic_id' => 2,
                'type' => 0,
                'episode' => 72
            ]
            ]);
    }
}
