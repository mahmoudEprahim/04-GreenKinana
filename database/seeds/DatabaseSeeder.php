<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(setting::class);
        $this->call(admin::class);
        $this->call(permissions::class);
        $this->call(roles::class);
        $this->call(model_has_roles::class);
    }
}
