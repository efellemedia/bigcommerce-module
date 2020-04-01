<?php

namespace Modules\Bigcommerce\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bigcommerce:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh BigCommerce tables, clearing all BigCommerce records from FusionCMS.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $jobs = [
            'Refreshing database...' => new \Modules\Bigcommerce\Jobs\RefreshDatabaseTables
        ];

        $progressBar = $this->output->createProgressBar(count($jobs));
        
        $progressBar->setFormat("%status:-45s%\n%current%/%max% [%bar%] %percent:3s%%\n🏁  %estimated:-20s%  %memory:20s%\n");
        $progressBar->start();

        foreach ($jobs as $message => $instance) {
            $progressBar->setMessage("\n" . $message, 'status');
            $progressBar->advance();

            try {
                dispatch($instance);
            } catch (Exception $exception) {
                Log::error($exception->getMessage(), (array) $exception->getTrace()[0]);

                $this->error("\n" . $exception->getMessage());
                $this->comment("\n" . 'Please check the error logs for more information.');
                exit;
            }
        }

        $progressBar->setMessage('Complete', 'status');
        $progressBar->finish();

        $this->info("\nSync complete.");
    }
}
