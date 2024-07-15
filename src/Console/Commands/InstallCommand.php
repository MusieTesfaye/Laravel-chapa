<?php

namespace Musie\LaravelChapa\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'chapa:install';
    protected $description = 'Install Chapa Service Provider assets';

    public function handle()
    {
        // Publish the config file
        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider'
        ]);

        $this->info('Chapa assets installed successfully.');
    }
}
