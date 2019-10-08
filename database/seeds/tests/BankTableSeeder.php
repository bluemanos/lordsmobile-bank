<?php

use Illuminate\Database\Seeder;

/**
 * Class BankTableSeeder
 */
class BankTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();
        DB::table('banks')->insert([
            [
                'name' => 'the bank',
                'created_at' => '2017-06-14 12:43:14',
                'updated_at' => now(),
            ],
        ]);
    }
}
