<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsRecord = [

           ['id'=>1,'name'=>'Hasan','status'=>1],
           ['id'=>2,'name'=>'High','status'=>1],
           ['id'=>3,'name'=>'Dakai','status'=>1],
           ['id'=>4,'name'=>'Pabnai','status'=>1],

        ];
        Brand::insert($brandsRecord);
    }
}
