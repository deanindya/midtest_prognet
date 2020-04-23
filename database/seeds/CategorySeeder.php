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
        $data->btn = "btn-success";
        $data->save();

        $data = new Category();
        $data->name = "School";
        $data->btn = "btn-primary";
        $data->save();
    }
}
