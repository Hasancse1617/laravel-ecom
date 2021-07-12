<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerReacords = [
          ['id'=>1,'image'=>'banner1.png','link'=>'','title'=>'Black Shirt','subtitle'=>'New Promotions','btn_text'=>'Shop Now','alt'=>'Black Shirt','status'=>1],
          ['id'=>2,'image'=>'banner2.png','link'=>'','title'=>'Red Shirt','subtitle'=>'New Promotions','btn_text'=>'Shop Now','alt'=>'Red Shirt','status'=>1],
          ['id'=>3,'image'=>'banner3.png','link'=>'','title'=>'White Shirt','subtitle'=>'New Promotions','btn_text'=>'Shop Now','alt'=>'White Shirt','status'=>1],
        ];
        Banner::insert($bannerReacords);
    }
}
