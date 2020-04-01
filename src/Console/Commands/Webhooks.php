<?php

namespace Modules\Bigcommerce\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Modules\Bigcommerce\Jobs\VerifyWebhooks;
use Modules\Bigcommerce\Jobs\GenerateWebhooks;

class Webhooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bigcommerce:webhooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate webhooks for communicating with FusionCMS.';

    /**
     * BigCommerce webhooks.
     * 
     * @var array
     */
    protected $hooks = [
        'store/product/*',
        'store/category/*',
        'store/sku/*',
        'store/customer/created',
        'store/customer/updated',
        'store/customer/deleted',
        'store/information/updated',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $jobs = [
            'Generating webhooks...' => new \Modules\Bigcommerce\Jobs\GenerateWebhooks($this->hooks),
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
