<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class fiscalseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fiscals')->insert([
            'start_date' => '2024-04-01',
            'end_date' => '2025-03-31',
            'label' => '24-25',
        ]);
    }
}
