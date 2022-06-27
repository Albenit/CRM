<?php

namespace App\Models;

use App\Imports\leadinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Traits\Macroable;

class lead extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


    public function campaign(){
        return $this->belongsTo(campaigns::class,'campaign_id')->withDefault(['name' => 'Campaign']);
    }
    public function family(){
        return $this->hasMany(family::class, 'leads_id');
    }
    public function info(){
        return $this->belongsTo(lead_info::class,'id','lead_id')->withDefault(['
            kampagne' => '',
            'grund' => '',
            'krankenkasse' => '',
            'bewertung' => '',
            'wichtig' => '',
            'teilnahme' => ''
            ]);
    }
    public function admin(){
        return $this->belongsTo(Admins::class,'assign_to_id','id');
    }

    public function leadsHistory(){
        return $this->belongsTo(lead_history::class,'id','leads_id')->withDefault([
            'image' => '',
            'status' => '',
        ]);
    }
    public function pendingRejectLead(){
        return $this->belongsTo(PendingRejectedLead::class,'id','lead_id')->withDefault([
            'begrundung' => ''
        ]);
    }
    
    public function pending_reject_lead(){
        return $this->belongsTo(PendingRejectedLead::class,'lead_id');
    }
    function getRouteKeyName()
    {
        return 'id';
    }

}
