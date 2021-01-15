<?php

use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

use App\Province;
use App\City;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $province) {
            Province::create([
                'province_id' => $province['province_id'],
                'title' => $province['province_name']
            ]);

            $daftarKota = RajaOngkir::kota()->dariProvinsi($province['province_id'])->get();
            foreach ($daftarKota as $city) {
                City::create([
                    'province_id' => $province['province_id'],
                    'city_id' => $city['city_id'],
                    'title' => $city['city_name']
                ]);
            }
        }
    }
}