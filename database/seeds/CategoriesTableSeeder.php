<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $categories = [
            [
                'name' => 'Vegetables',
                'status' => 1,
            ],
            [
                'name' => 'Fruits',
                'status' => 1,
            ]
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
