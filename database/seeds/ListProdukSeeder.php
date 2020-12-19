<?php

use Illuminate\Database\Seeder;

class ListProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_produk')->insert([
            [
            'kategori_id' => '1',
            'merekProduk' => 'Asus'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'MSI'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Lenovo'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Samsung'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Apple'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Redmi'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Philip'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Toshiba'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Panasonic'
            ]
        ]);
    }
}
