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
    {
        {
            $city = new Category();
            $city->name = 'Bóng đá';
            $city->save();

            $city = new Category();
            $city->name = 'Quần vợt';
            $city->save();

            $city = new Category();
            $city->name = 'Thể thao điện tử';
            $city->save();

            $city = new Category();
            $city->name = 'Thể loại khác';
            $city->save();
        }
    }
}
