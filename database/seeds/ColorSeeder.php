<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = new Color();
      $data->name = "Green";
      $data->color_1 = "#14c4d1";
      $data->color_2 = "#51e4ad";
      $data->save();

      $data = new Color();
      $data->name = "Orange";
      $data->color_1 = "ffae7f";
      $data->color_2 = "#fed882";
      $data->save();
    }
}
