<?php

namespace App\Console\Commands;

use Bernard\System\SystemInit;
use Illuminate\Console\Command;

class Initialise extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initialise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialise the website';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $init = new SystemInit();

        $init->create_root_user();
    }
}
