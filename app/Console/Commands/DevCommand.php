<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class DevCommand.
 *
 * @package App\Console\Commands
 * @codeCoverageIgnore  the command is for developer use only
 *
 * Bunch of commands by ide-helper.
 */
class DevCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run bunch of useful commands for devs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('ide-helper:generate');
        $this->call('ide-helper:models', ['--nowrite' => 'No']);
        $this->call('ide-helper:meta');
    }
}
