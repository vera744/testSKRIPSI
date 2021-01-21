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
            'namaKondisi' => '96% - 100%',
            'keterangan_kondisi' => '(Pembelian dalam sebulan terakhir, tanpa goresan, ada box dan garansi, fungsional)'
            ],
            [
            'kondisi_id' => '2',
            'namaKondisi' => '91% - 95%',
            'keterangan_kondisi' => '(Maksimal 3 goresan kecil, ada box/garansi atau keduanya, fungsional)'
            ],
            [
            'kondisi_id' => '3',
            'namaKondisi' => '81% - 90%',
            'keterangan_kondisi' => '(Maksimal 5 goresan kecil, fungsional)'
            ],
            [
            'kondisi_id' => '4',
            'namaKondisi' => '71% - 80%',
            'keterangan_kondisi' => '(Maksimal > 5 goresan kecil/besar, fungsional)'
            ]
        ]);
    }
}
