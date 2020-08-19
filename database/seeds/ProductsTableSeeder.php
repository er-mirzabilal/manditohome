<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $products =  [
            [
                'name' => 'Potatoes',
                'picture' => 'potatoes.png',
                'sell_type' => 'kg',
                'quant_step' => 0.5,
                'price' => 20.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Bell Pepper',
                'picture' => 'bell-pepper.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 40.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Cabbage',
                'picture' => 'cabbage.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 30.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Cauli Flower',
                'picture' => 'cauli-flower.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 25.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Onions',
                'picture' => 'onions.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 45.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Tomato',
                'picture' => 'tomato.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 50.00,
                'status' => 1,
                'cat_id' => 1,
            ],
            [
                'name' => 'Banana',
                'picture' => 'banana.png',
                'sell_type' => 'dozen',
                'quant_step' => 1,
                'price' => 10.00,
                'status' => 1,
                'cat_id' => 2,
            ],
            [
                'name' => 'Red Apple',
                'picture' => 'red-apple.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 50.00,
                'status' => 1,
                'cat_id' => 2,
            ],
            [
                'name' => 'Orange',
                'picture' => 'orange.png',
                'sell_type' => 'dozen',
                'quant_step' => 1,
                'price' => 12.00,
                'status' => 1,
                'cat_id' => 2,
            ],
            [
                'name' => 'Strawberry',
                'picture' => 'strawberry.png',
                'sell_type' => 'kg',
                'quant_step' => 0.25,
                'price' => 80.00,
                'status' => 1,
                'cat_id' => 2,
            ]
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
