<?php

namespace App\Console\Commands;

use App\Events\SendNotification;
use App\Models\Admins;
use App\Notifications\SendNotificationn;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class informfs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'informfs';

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
        $fs = Admins::role(['fs'])->get();
        foreach($fs as $f){
         $count = DB::table('leads')
        ->where('wantsonline', 0)
        ->whereNotNull('assign_to_id')
        ->where('assigned',1)
        ->where('completed',0)
        ->select('leads.appointment_date','leads.assign_to_id')
        ->where('appointment_date', Carbon::now()->addDays()->toDateString())
        ->where('leads.assign_to_id',$f->id)
        ->count();
        $url = '<a href="' . route("Appointments") . '"> Du hast für morgen ' . $count . ' termine bekommen </a>';
        if($count > 0){
        $f->notify(new SendNotificationn($url));
        }
        }
        return $this->comment('Done');
    }
}
