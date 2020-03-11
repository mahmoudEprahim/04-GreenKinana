<?php

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'create',
                'guard_name' => 'admin',
            ],[
                'name' => 'edit',
                'guard_name' => 'admin',
            ],[
                'name' => 'delete',
                'guard_name' => 'admin',
            ],
        ]);
    }
}
