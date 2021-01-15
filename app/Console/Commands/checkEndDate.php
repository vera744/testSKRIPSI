<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\product;
use App\mortgage_detail;
use App\Mortgage;
use DateTime;
use App\listProduk;
use App\kategoriProduk;
use App\Kondisi;

use Illuminate\Support\Facades\DB;
class checkEndDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkEndDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date1=date_create(date('Y-m-d'));
        DB::table('mortgage_details')->where('endDate',"=",$date1)->update(['status'=>'Gagal']);
    }
}
