<?php

namespace App\Console\Commands;

use App\Events\SendNotification;
use App\Models\Admins;
use App\Notifications\SendNotificationn;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class informsl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'informsl';

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
        $sales = Admins::role(['salesmanager','admin'])->get();
        foreach($sales as $sl){
            $count = DB::table('pendencies')
            ->where('pendencies.done',0)
            ->where('pendencies.completed',0)
            ->where('pendencies.created_at','<',Carbon::now()->subDays(30)->format('Y-m-d'))
            ->count();
            if($count > 0){
            $url = '<a href="' . route("tasks") . '"> Sie haben ' . $count . ' Pendenzen länger als einen Monat geöffnet </a>';
            $sl->notify(new SendNotificationn($url));
            }
          
            
        }
        return $this->comment('Done');
    }
}
