<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = new Category();
      $data->name = "Work";
      $data->color_id = 1;
      $data->save();

      $data = new Category();
      $data->name = "School";
      $data->color_id = 2;
      $data->save();
    }
}
