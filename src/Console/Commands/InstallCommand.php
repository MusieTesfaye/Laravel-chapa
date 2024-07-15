<?php

namespace Musie\LaravelChapa\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'chapa:install';
    protected $description = 'Install the Chapa package';

    public function handle()
    {
        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider',
            '--tag' => 'config'
        ]);

        $this->info('Publishing controllers...');

        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider',
            '--tag' => 'controllers'
        ]);

        $this->info('Publishing facades...');

        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider',
            '--tag' => 'facades'
        ]);

        $this->info('Publishing views...');

        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider',
            '--tag' => 'views'
        ]);

        $this->info('Publishing services...');

        $this->call('vendor:publish', [
            '--provider' => 'Musie\\LaravelChapa\\ChapaServiceProvider',
            '--tag' => 'services'
        ]);

        $this->info('Chapa package installed successfully.');
    }
}
