<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
            // 'name' => 'admin',
            // 'dob' => Carbon::parse('1999-01-01'),
            // 'nomorHP'=>'081345678901',
            // 'alamat' => 'Jalan Yamaneh',
            // 'email'=>"admin@admin.com",
            // 'nomorKTP'=>'90909090',
            // 'fotoKTP'=> 'landscape1.jpg',
            // 'fotodenganKTP'=>'landscape2.jpg',
            // 'role'=>'admin',
            // 'password'=>bcrypt('00000000')
        // ]);

     
        $faker=Faker::create('en_US');

        for($i=1;$i<=10;$i++){
            $a=(string)$faker->numberBetween(10,99);
            $is=(string)$i;
            DB::table('users')->insert([
              'name'=>$faker->name,
              'dob' => Carbon::parse('1990-02-03'),
              'nomorHP'=>'081345678901',
              'alamat' => $faker->address,
              'email'=>$faker->email,
              'nomorKTP'=>'90909090',
              'fotoKTP'=> 'landscape1.jpg',
              'fotodenganKTP'=>'landscape2.jpg',
              'password'=>bcrypt('00000000'),
              'kota'=>'60',
              'provinsi'=>'26',
              'role'=>'member'
            ]);
        
    
    }
    }
}
