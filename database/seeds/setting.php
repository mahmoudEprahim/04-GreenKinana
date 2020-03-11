<?php

use Illuminate\Database\Seeder;

class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'sitename_ar' => 'الكنانة',
            'sitename_en' => 'alqinana',
            'logo_ar' => '',
            'logo_en' => '',
            'main_currency' => 'SAR',
            'email' => 'alqinana@alqinana.com',
            'main_lang' => 'ar',
            'main_currency' => '',
            'main_color' => '',
            'footer_header_color' => '',
            'about_site_ar' => '',
            'about_site_en' => '',
            'address' => '',
            'phone' => '',
            'phone_2' => '',
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'youtube' => '',
            'keyword' => '',
        ]);
    }
}
