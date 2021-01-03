<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'dob' => Carbon::parse('1999-01-01'),
            'nomorHP'=>'081345678901',
            'alamat' => 'Jalan Yamaneh',
            'email'=>"admin@admin.com",
            'nomorKTP'=>'90909090',
            'fotoKTP'=> 'landscape1.jpg',
            'fotodenganKTP'=>'landscape2.jpg',
            'role'=>'admin',
            'password'=>bcrypt('00000000')
        ]);
    }
}
