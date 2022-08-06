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
                'title'=>'ワンピース',
                'author'=>'尾田栄一郎',
                'magazine'=>'ジャンプ'
            ],
            [
                'title'=>'ナルト',
                'author'=>'岸本斉史',
                'magazine'=>'ジャンプ'
            ],
            [
                'title'=>'僕のヒーローアカデミア',
                'author'=>'堀越耕平',
                'magazine'=>'ジャンプ'
            ],
            [
                'title'=>'名探偵コナン',
                'author'=>'青山剛昌',
                'magazine'=>'サンデー'
            ],
            [
                'title'=>'東京リベンジャーズ',
                'author'=>'和久井健',
                'magazine'=>'マガジン'
            ],
            [
                'title'=>'ブルーロック',
                'author'=>'金城宗幸',
                'magazine'=>'マガジン'
            ],
        ]);
    }
}
