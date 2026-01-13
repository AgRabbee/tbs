<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_user','user_id', 'role_id');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company','company_user','user_id')->withPivot('status');
    }


    public function company_users()
    {
        return DB::table('users')
            ->join('role_user','users.id','role_user.user_id')
            ->whereIn('role_user.role_id', [2, 3])
            ->where('users.id','!=','1')
            ->get();
    }

    public function count_company_users()
    {
        //SELECT count(users.id) FROM users, role_user WHERE users.id = role_user.user_id AND role_user.role_id IN (2,3) AND users.id != 1
        return DB::table('users')
            ->selectRaw('count(users.id) as count_company_users')
            ->join('role_user','users.id','role_user.user_id')
            ->whereIn('role_user.role_id', [2, 3])
            ->where('users.id','!=','1')
            ->get();
    }

    public function companyCount()
    {
        //SELECT count(users.id) FROM users, role_user WHERE users.id = role_user.user_id AND role_user.role_id IN (2,3) AND users.id != 1
        return Company::where('company_status','1')->count();
    }

    public function customers()
    {
        return DB::table('users')
            ->selectRaw('users.*,users.id as u_id,role_user.*')
            ->leftJoin('role_user','users.id','role_user.user_id')
            ->whereNotIn('role_user.role_id', [1,2,3])
            ->orWhere('users.user_status','=','0')
            ->get();
    }
    public function tripsCount()
    {
        return DB::table('trips')
            ->selectRaw('count(trips.id) as tripsCount')
            ->get();
    }
}
