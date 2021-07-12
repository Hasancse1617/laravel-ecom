<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [

         ['id'=>1,'user_id'=>1,'fname'=>'Hasan','lname'=>'Ali','address'=>'Gorgory','city'=>'Ishwardi','district'=>'Pabna','country'=>'Bangladesh','zipcode'=>'6622','mobile'=>'01774313179','status'=>1],

         ['id'=>2,'user_id'=>2,'fname'=>'Humaira','lname'=>'Yeasmin','address'=>'Gorgory','city'=>'Ishwardi','district'=>'Pabna','country'=>'Bangladesh','zipcode'=>'6622','mobile'=>'01774313179','status'=>1]

        ];
        DeliveryAddress::insert($deliveryRecords);
    }
}
