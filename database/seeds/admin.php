<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'infosas',
                'email' => 'infosas2019@infoics.com',
                'password' => bcrypt('ics@gits'),
            ],
            
        ]);
    }
}
