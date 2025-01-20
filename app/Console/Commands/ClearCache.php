<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ClearCache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('cache:clear');
        $this->info('Cache clear successfully');
        Artisan::call('config:cache');
        $this->info('Config cached successfully');
        Artisan::call('route:cache');
        $this->info('Route cached successfully');
        Artisan::call('view:cache');
        $this->info('View cached successfully');
        $this->info('-- Done --');
    }
}
