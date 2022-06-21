<?php

namespace App\Console\Commands;

use App\Models\Provisions;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RenevProvision extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'provision-renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       Provisions::first()->update(['from' => Carbon::now()->format('Y-m-d'),'to' => Carbon::now()->addMonth()->format('Y-m-d')]);
    }
}
