<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ConsumerResetPasswordNotification;
use DB;
use App\Post;

class Consumer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'consumers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ConsumerResetPasswordNotification($token));
    }

    public function consumerprofile(){
        return $this->belongsTo('App\ConsumerProfile');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }
    public function countposts() {
        $count = DB::table('posts')->where('poster', $this->username)->count();
        return $count;
    }

    public function getposts() {
        $posts = Post::where('poster', $this->username)->orderBy('id', 'desc')->paginate(5);
        return $posts;
    }
}
