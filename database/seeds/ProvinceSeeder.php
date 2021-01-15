<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Http;
use App\Province;
use GuzzleHttp\Client;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client::withHeader([
            'key' => 'b2685bfdc389138af911b61ac0957e88',
            
        ])->get('https://api.rajaongkir.com/starter/province');
        
        $provinces = $response['rajaongkir']['results'];

        foreach($provinces as $value){
            $data[] = [
                'province_id' => $value['province_id'],
                'title' => $value['province'],
            ];
        }

        Province::insert($data);
    }
}
