<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produk')->insert([
            [
                'namaKategori' => 'Laptop'
            ],
            [
                'namaKategori' => 'Handphone'
            ],
            [
                'namaKategori' => 'Elektronik'
            ],
           
        ]);
    }
}
