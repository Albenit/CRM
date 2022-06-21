<?php

namespace App\Listeners;

use App\Events\RejectLead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PharIo\Manifest\Author;
use Illuminate\Support\Facades\Auth;
use App\Models\lead_history;

class RejectLeadEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RejectLead $event)
    {
  
        $rejectedlead = new lead_history();

        $rejectedlead->leads_id = $event->leads_id;
        $rejectedlead->reason = $event->reason;
        $rejectedlead->image = $event->image;
        $rejectedlead->admin_id = Auth::user()->id;
        $rejectedlead->save();
    }
}
