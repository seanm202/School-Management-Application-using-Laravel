<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AppInstallCommand extends Command
{
    // The name and signature of the console command
    protected $signature = 'app:install';

    // The console command description
    protected $description = 'Run database setup and migrations during app installation';

    public function handle()
    {
        $this->info('Starting installation...');

        try {
            // 1. Force run database migrations
            $this->info('Running database migrations...');
            Artisan::call('migrate', ['--force' => true]);

            // 2. Run database seeders (for initial/default data)
            $this->info('Seeding default application data...');
            Artisan::call('db:seed', ['--force' => true]);

            // 3. Execute specific raw SQL commands if needed
            $this->info('Executing custom database configurations...');
            DB::statement("UPDATE settings SET value = 'installed' WHERE key = 'app_status'");

            $this->info('Installation completed successfully!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Installation failed: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
