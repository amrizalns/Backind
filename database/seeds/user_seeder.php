<?php

use Illuminate\Database\Seeder;
use App\User;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('users')->delete();
         User::create([
           'id_user'=>'1',
           'id_roles'=>'1',
           'name'=>'Backpacker Indonesia',
           'email'=>'official@backind.com',
           'password'=>bcrypt('backind1234'),
           'address'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
           'phone_number'=>'085334667569',
           'avatar'=>'',
         ]);
         User::create([
           'id_user'=>'2',
           'id_roles'=>'2',
           'name'=>'Amrizal Nurrachman Syahid',
           'email'=>'amrizalns@gmail.com',
           'password'=>bcrypt('amrizalns'),
           'address'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
           'phone_number'=>'085334667569',
           'avatar'=>'',
         ]);

         User::create([
           'id_user'=>'3',
           'id_roles'=>'2',
           'name'=>'Mindha Ningrum',
           'email'=>'minmindha@gmail.com',
           'password'=>bcrypt('minmindha'),
           'address'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
           'phone_number'=>'085334667569',
           'avatar'=>'',
         ]);

         User::create([
           'id_user'=>'4',
           'id_roles'=>'5',
           'name'=>'Taufan',
           'email'=>'taufanfadhillah@gmail.com',
           'password'=>bcrypt('taufanfadhillah'),
           'address'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
           'phone_number'=>'085334667569',
           'avatar'=>'',
         ]);

         User::create([
           'id_user'=>'5',
           'id_roles'=>'5',
           'name'=>'Khania',
           'email'=>'khaniaputri@gmail.com',
           'password'=>bcrypt('khaniaputri'),
           'address'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
           'phone_number'=>'085334667569',
           'avatar'=>'',
         ]);
     }
}
