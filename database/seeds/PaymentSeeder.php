<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'namePayment' => 'Transfer Bank BCA',
                'norek' => '723618192'
            ],
            [
                'namePayment' => 'Transfer Bank Mandiri',
                'norek' => '723273213'
            ],
            [
                'namePayment' => 'Transfer Bank BRI',
                'norek' => '832610323'
            ],
            [
                'namePayment' => 'Transfer Bank BNI',
                'norek' => '816213103'
            ],
           
        ]);
    }
}
