<?php

use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi')->insert([
            [
            'kondisi_id' => '1',
            'namaKondisi' => 'Keren Banget'
            ],
            [
            'kondisi_id' => '2',
            'namaKondisi' => 'Keren Aja'
            ],
            [
            'kondisi_id' => '3',
            'namaKondisi' => 'Hampir Keren'
            ],
            [
            'kondisi_id' => '4',
            'namaKondisi' => 'Kurang Keren'
            ],
            [
            'kondisi_id' => '5',
            'namaKondisi' => '70%-79%, Fungsional'
            ]
        ]);
    }
}
