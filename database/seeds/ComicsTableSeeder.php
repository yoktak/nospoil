<?php

use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
            [
                'name_comics'=>'comic1',
                'name_author'=>'author1',
                'name_magazine'=>'magazineA'
            ],
            [
                'name_comics'=>'comic2',
                'name_author'=>'author2',
                'name_magazine'=>'magazineA'
            ],
            [
                'name_comics'=>'comic3',
                'name_author'=>'author3',
                'name_magazine'=>'magazineB'
            ],
            [
                'name_comics'=>'comic4',
                'name_author'=>'author4',
                'name_magazine'=>'magazineB'
            ],
            [
                'name_comics'=>'comic5',
                'name_author'=>'author5',
                'name_magazine'=>'magazineC'
            ],
            [
                'name_comics'=>'comic6',
                'name_author'=>'author6',
                'name_magazine'=>'magazineC'
            ],
        ]);
    }
}
