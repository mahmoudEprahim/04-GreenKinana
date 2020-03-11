<?php

use Illuminate\Database\Seeder;

class branche extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'name_ar' => 'أجا',
                'name_en' => 'Aga',
            ],
            [
                'name_ar' => 'برج النور',
                'name_en' => 'porgue El Nour ',
            ]
        ]);
    }
}
