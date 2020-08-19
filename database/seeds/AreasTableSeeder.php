<?php
use App\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::truncate();
        $areas = [
            [
                'name' => 'Garden Town',
                'shipping_price' => 50,
                'available' => 1,
            ],
            [
                'name' => 'Wapda Town',
                'shipping_price' => 50,
                'available' => 1,
            ],
            [
                'name' => 'Model Town',
                'shipping_price' => 50,
                'available' => 1,
            ]
        ];

        foreach($areas as $area){
            Area::create($area);
        }
    }
}
