<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'Donor',
            'guard_name' => 'api',
            
        ]);
    }
}
