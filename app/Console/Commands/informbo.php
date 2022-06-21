<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admins;
use App\Notifications\SendNotificationn;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class informbo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'informbo';

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
        
        $backoffice = Admins::role(['backoffice','admin'])->get();
        foreach($backoffice as $bo){
            $count = DB::table('pendencies')
            ->where('pendencies.done',0)
            ->where('pendencies.completed',0)
            ->where('pendencies.created_at','<',Carbon::now()->subDay()->format('Y-m-d'))
            ->count();
            $url = '<a href="' . route("tasks") . '"> Sie haben ' . $count . ' Hänge länger als einen Tag geöffnet </a>';
if($count > 0){
            $bo->notify(new SendNotificationn($url));
}
        }
        return $this->info('Done');
    }
}
