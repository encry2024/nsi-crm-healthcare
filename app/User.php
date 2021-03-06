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
        return $this->hasMany(Record::class);
    }

    public function records_2nd_list()
    {
        return $this->hasMany(Record2ndList::class);
    }

    public function callbacks()
    {
        return $this->hasMany('App\Callback')->orderBy('schedule');
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
        if($recentStatus) {
            $recentStatus->duration = $now->getTimestamp() - $status_date->getTimestamp();
            $recentStatus->save();
        }

        // Add status entry to status table
        $this->statuses()->save(new Status(['status' => $status, 'record_id' => $record_id]));

        return;
    }

    public function userType()
    {
        return $this->type();
    }

    public static function showAdminDashboard()
    {

        $ctr = 0;
        $all_records = Record::with(['user' => function ($query) {
            $query->where('type', '=', 'agent');
        }]);

        if(!empty(request('gender'))) {
            $all_records = $all_records->where('gender', request('gender'));
        }

        if(!empty(request('age_from'))) {
            $all_records = $all_records->where('age', '>=', request('age_from'));
        }

        if(!empty(request('age_to'))) {
            $all_records = $all_records->where('age', '<=', request('age_to'));
        }

        $all_records = $all_records->orderBy('updated_at')->orderBy('gender')->orderBy('age', 'DESC')->paginate(20);
        $all_records->setPath("?gender=" . request('gender') . "&age_from=" . request('age_from') . "&age_to=" . request('age_to'));

        $callbacks = Callback::where('schedule', '>', date('Y-m-d', strtotime('-2 day', time())))->get();

        return view('auth.dashboard', compact('ctr', 'all_records', 'callbacks'));
    }
}