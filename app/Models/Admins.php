<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Musonza\Chat\Traits\Messageable;
use PhpParser\Node\Expr\FuncCall;
use NotificationChannels\WebPush\HasPushSubscriptions;
use NotificationChannels\WebPush\WebPushMessage;

class Admins extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, HasRoles, Messageable,SoftDeletes,HasPushSubscriptions;

    protected $guard_name = 'admins';
    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Approved!')
            ->icon('/approved-icon.png')
            ->body('Your account was approved!')
            ->action('View account', 'view_account')
            ->options(['TTL' => 1000]);
            // ->data(['id' => $notification->id])
            // ->badge()
            // ->dir()
            // ->image()
            // ->lang()
            // ->renotify()
            // ->requireInteraction()
            // ->tag()
            // ->vibrate()
    }

    protected $hidden = [
        'password',
        'remember_token',
        'pin',
        'phonenumber',
        'confirmed',
        'firsttime',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];
public function headadmin(){
    return $this->belongsTo(Admins::class,'admin_id')->withDefault(auth()->user());
}
public function childrens(){
    return $this->hasMany(Admins::class,'admin_id');
}
    public function leads(){
        return $this->hasMany(lead::class,'assign_to_id');
    }
    public function pendencies(){
        return $this->hasMany(Pendency::class,'admin_id');
    }
    public function personaldata(){
        if ($this->admin_id == null){
            return $this->hasOne(EmployeePersonalData::class,'admin_id');
        }else{
            return $this->headadmin->hasOne(EmployeePersonalData::class,'admin_id');
        }
    
            
        
        
    }
    public function kunden(){
        return $this->hasManyThrough(family::class,lead::class,'assign_to_id','leads_id');
    }
    public function salary(){
    return $this->belongsTo(Group::class,'group_id')->withDefault(['salary' => 0,'expenses' => 0]);
    }
public function provision(){
    return $this->group->belongsTo(Provisions::class,'provision_id')->withDefault(['id'=>0]);
}
public function group(){
    return $this->belongsTo(Group::class,'group_id')->withDefault(['id' => 0, 'name' => 'Keines']);
}


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 protected $guarded = [];
}
