<?php

use Illuminate\Database\Seeder;

class DatabaseTestsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UsersForPermissionsSeeder::class);
    }
}
