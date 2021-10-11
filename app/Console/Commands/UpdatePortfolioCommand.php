<?php

namespace App\Console\Commands;

use App\Helpers\LoggerHelper;
use App\Services\AdvertsService;
use Illuminate\Console\Command;
use Throwable;

class UpdatePortfolioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:updatePortfolio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update portfolio';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        private AdvertsService $advertsService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->advertsService->updatePortfolio();
            $this->info('Successfully updated portfolio');
        } catch (Throwable $e) {
            new LoggerHelper($e);
        }
    }
}
