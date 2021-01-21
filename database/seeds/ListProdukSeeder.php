<?php

use Illuminate\Database\Seeder;
use App\listProduk;

class ListProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
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
            'kategori_id' => '1',
            'merekProduk' => 'Acer'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'HP'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Dell'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Apple'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Toshiba'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Microsoft'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Razer'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Xiaomi'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Alienware'
            ],
            [
            'kategori_id' => '1',
            'merekProduk' => 'Samsung'
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
            'kategori_id' => '2',
            'merekProduk' => 'LG'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Sony'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Xiaomi'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Oppo'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Vivo'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Lava'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Nokia'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Lenovo'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Asus'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Advan'
            ],
            [
            'kategori_id' => '2',
            'merekProduk' => 'Polytron'
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
            'merekProduk' => 'Polytron'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Changhong'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Samsung'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Hisense'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'TCL'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Coocaa'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Akari'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Sharp'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Sony'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'LG'
            ],
            [
            'kategori_id' => '3',
            'merekProduk' => 'Panasonic'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Canon'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Sony'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Olympus'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Casio'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Panasonic'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Pentax'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Samsung'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Kodax'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Fujifilm'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Hasselblad'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Seitz'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Phase One'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Panoscan'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Leica'
            ],
            [
            'kategori_id' => '4',
            'merekProduk' => 'Nikon'
            ]
        ];
        listProduk::insert($data);
    }
}
