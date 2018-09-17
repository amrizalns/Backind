<?php

use Illuminate\Database\Seeder;
use App\menu;
class menu_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menus')->delete();
      menu::create([
        'id_menu'=>'1',
        'status'=>'Wisata',
      ]);
      menu::create([
        'id_menu'=>'2',
        'status'=>'Homestay',
      ]);
    }
}
