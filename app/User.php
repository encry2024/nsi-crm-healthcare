<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DateTime;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'status_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function statuses() {
        return $this->hasMany('App\Status')->orderBy('created_at');
    }

    public function records()
    {
        return $this->hasMany(Record::class)->orderBy('created_at');
    }

    public function addStatus($status, $record_id = NULL) {
        if($this->status == $status) return;

        // Get first the current user status infos before update
        $status_date = new DateTime($this->status_date);

        $now = new DateTime();

        // Update user status
        $this->status = $status;
        $this->status_date = $now;
        $this->save();

        //update duration of recent status
        $recentStatus = Status::where('user_id', $this->id)->orderBy('id', 'DESC')->first();
        $recentStatus->duration = $now->getTimestamp() - $status_date->getTimestamp();
        $recentStatus->save();

        // Add status entry to status table
        $this->statuses()->save(new Status(['status' => $status, 'record_id' => $record_id]));

        return;
    }
}