<?php

namespace App;

use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(){
        return $this->hasMany(Project::class, 'owner_id')->latest('updated_at');
    }

    public function allProjects(){

        return Project::where('owner_id', $this->id)
            ->orWhereHas('members', function ($query){
                $query->where('user_id', $this->id);
            })
            ->get();

//        $projectsCreated = $this->projects;
//
//        $ids = DB::table('project_member')
//            ->where('user_id', $this->id)
//            ->pluck('project_id');
//
//        $projectsSharedWith = Project::find($ids);
//
//        return $projectsCreated->merge($projectsSharedWith);
    }
}
