<?php

namespace Modules\Bigcommerce\Console\Commands;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Sync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bigcommerce:sync {--model=all} {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync BigCommerce products, and product records with FusionCMS.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $model = Str::singular($this->option('model'));
        $model = strtolower($model);
        $id    = $this->option('id');

        switch ($model) {
            case 'store':
            case 'product':
            case 'variant':
            case 'customer':
            case 'relation':
                $this->syncOne($model, $id);
                break;
            case 'all':
                $this->syncAll();
                break;
            default:
                $this->error("\nModel not found.");
                exit;
        }
    }

    /**
     * Sync a single record.
     * 
     * @param  string   $model
     * @param  integer  $id
     * @return void
     */
    private function syncOne($model, $id = null)
    {
        switch ($model) {
            case 'store':
                $this->fire([
                    'Requesting store settings...' => new \Modules\Bigcommerce\Jobs\Requests\Store\SettingsRequest,
                ]);
                break;
            case 'product':
                $this->fire([
                    'Requesting product...' => new \Modules\Bigcommerce\Jobs\Requests\Catalog\ProductRequest($id),
                ]);
                break;
            case 'variant':
                $this->fire([
                    'Requesting product variants...' => new \Modules\Bigcommerce\Jobs\Requests\Catalog\ProductVariantRequest($id)
                ]);
                break;
            case 'customer':
                $this->fire([
                    'Requesting customer data...' => new \Modules\Bigcommerce\Jobs\Requests\Customer\CustomerRequest($id)
                ]);
                break;
            case 'relation':
                $this->fire([
                    'Building product relations...' => new \Modules\Bigcommerce\Jobs\Requests\Catalog\ProductRelatedRequest($id)
                ]);
                break;
        }
    }

    /**
     * Sync all records.
     * 
     * @return void
     */
    private function syncAll()
    {
        $this->fire([
            'Requesting products...'         => new \Modules\Bigcommerce\Jobs\Requests\Catalog\ProductRequest,
            'Requesting customer data...'    => new \Modules\Bigcommerce\Jobs\Requests\Customer\CustomerRequest,
        ]);
    }

    /**
     * Fire job request(s).
     * 
     * @param  string  $message
     * @param  Job     $instance
     * @return void
     */
    private function fire($jobs)
    {
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
