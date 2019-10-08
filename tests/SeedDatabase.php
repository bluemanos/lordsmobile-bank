<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait SeedDatabase
{
    /**
     * Indicates if the test database has been seeded.
     *
     * @var bool
     */
    public static $seeded = false;

    /**
     * Seeds the database.
     *
     * @return void
     */
    public function seedDatabase()
    {
        if (self::$seeded === false) {
            $this->artisan('migrate');

            $this->truncateTables();
            $this->artisan('db:seed', ['--class' => 'DatabaseTestsSeeder']);

            $this->syncTransactionTraits();
            self::$seeded = true;
        }
    }

    /**
     * Persists the seed and begins a new transaction
     * where the rollback has been already registered in Transaction traits.
     *
     * @return void
     */
    public function syncTransactionTraits()
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshDatabase::class]) || isset($uses[DatabaseTransactions::class])) {
            $database = $this->app->make('db');
            foreach ($this->connectionsToTransact() as $name) {
                $database->connection($name)->commit();
                $database->connection($name)->beginTransaction();
            }
        }
    }

    /**
     * Truncate (clear) a tables.
     *
     * @return void
     */
    private function truncateTables()
    {
        $tableNames = \Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        \DB::statement('SET foreign_key_checks=0');
        foreach ($tableNames as $name) {
            if ($name === 'migrations') {
                continue;
            }
            \DB::table($name)->truncate();
        }
        \DB::statement('SET foreign_key_checks=1');
    }
}
