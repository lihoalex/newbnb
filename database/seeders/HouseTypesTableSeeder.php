<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
                array('id' => '1', 'type' => 'single family house'),
                array('id' => '2', 'type' => 'haunted house'),
                array('id' => '3', 'type' => 'apartment'),
                array('id' => '4', 'type' => 'wood shed'),
                array('id' => '5', 'type' => 'tent'),
                array('id' => '6', 'type' => 'open air'),
        );

        DB::table('house_types')->insert($types);
    }
}
