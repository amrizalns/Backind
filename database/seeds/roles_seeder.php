<?php

use Illuminate\Database\Seeder;
use App\roles;
class roles_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        roles::create([
          'id_roles'=>'1',
          'status'=>'sp_admin',
        ]);
        roles::create([
          'id_roles'=>'2',
          'status'=>'admin',
        ]);
        roles::create([
          'id_roles'=>'5',
          'status'=>'user',
        ]);
        roles::create([
          'id_roles'=>'10',
          'status'=>'paid_user',
        ]);
    }
}
