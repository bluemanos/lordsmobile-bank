<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsersForPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUser = User::find(1);
        $firstUser->givePermissionTo('all');
    }
}
