<?php

namespace App\Console\Commands;

use App\Models\Bill;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class billadd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'billadd:everymonth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bill automatic add every month starting';

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
     * @return int
     */
    public function handle()
    {

        $customers = Customer::with('package')->where('sp_id', "sp-01")->get();


        foreach ($customers as $customer){

            $bills = new Bill();
            $bills->sp_id =  $customer->sp_id;
            $bills->customer_id = $customer->customer_id;
            $bills->month = Carbon::now()->englishMonth;
            $bills->year = Carbon::now()->year;
//            $bills->month = "December";
//            $bills->year = "2022";
            $bills->service_charge = 0;
            $bills->payment_date = "0000-00-00";
            $bills->paid_amount =$customer->package->price;
            $bills->payment_status = 0;
            $bills->save();

            $webBill = Bill::find($bills->id);
             $bill_id = "bill".$webBill->id.$bills->sp_id;
            $webBill->bill_id = $bill_id;
            $webBill->save();

        }
//        return "hello";


    }
}
