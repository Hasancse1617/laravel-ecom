<?php

use Illuminate\Database\Seeder;
use App\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductsAttributeData = [
           ['id'=>1,'product_id'=>1,'size'=>'Small','price'=>1200,'stock'=>10,'sku'=>'BT001','status'=>1],
           ['id'=>2,'product_id'=>1,'size'=>'Medium','price'=>1500,'stock'=>10,'sku'=>'BT002','status'=>1],
           ['id'=>3,'product_id'=>1,'size'=>'Large','price'=>1800,'stock'=>10,'sku'=>'BT003','status'=>1],
        ];

        ProductsAttribute::insert($ProductsAttributeData);
    }
}
