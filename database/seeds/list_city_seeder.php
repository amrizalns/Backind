<?php

use Illuminate\Database\Seeder;
use App\city;

class list_city_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cities')->delete();
      city::create([
        'id_city'=>'1',
        'city'=>'Kota Bandung',
      ]);
      city::create([
        'id_city'=>'2',
        'city'=>'Kab. Bandung Barat',
      ]);
      city::create([
        'id_city'=>'3',
        'city'=>'Kab. Bandung Selatan',
      ]);
      city::create([
        'id_city'=>'4',
        'city'=>'Kab. Bandung',
      ]);
    }
}
