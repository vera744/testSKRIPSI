<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Province;
use App\City;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'b2685bfdc389138af911b61ac0957e88',
            
        ])->get('https://api.rajaongkir.com/starter/city');
        
        $cities = $response['rajaongkir']['results'];

        foreach($cities as $value){
            $data[] = [
                'province_id' => $value['province_id'],
                'city_id' => $value['city_id'],
                'type' => $value['type'],
                'cityTitle' => $value['city_name'],
                'postal_code' => $value['postal_code'],

            ];
        }

        City::insert($data);
    }
}
