<?php

namespace App\Console\Commands;

use App\Jobs\FetchRandomUser;
use Illuminate\Console\Command;

class RandomUserFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'randomuser:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch random user from queue.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        FetchRandomUser::dispatch();
        return 0;
    }
}
