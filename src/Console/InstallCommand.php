<?php

namespace Jetimob\RDStation\Console;

use Illuminate\Console\Command;
use Jetimob\RDStation\RDStationServiceProvider;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rdstation:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes RDStation configuration files';


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing RDStation configuration file.');
        $this->call('vendor:publish', [
            '--provider' => RDStationServiceProvider::class,
            '--tag'      => 'config'
        ]);
        $this->output->success('Configuration file published!');
    }
}
