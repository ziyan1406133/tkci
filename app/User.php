<?php

namespace App;

use App\Model\Article\Article;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id')->orderBy('created_at', 'desc');
    }
    public function published_articles()
    {
        return $this->hasMany(Article::class, 'author_id')->orderBy('created_at', 'desc')->where('status', 'Published');
    }
    public function drafts()
    {
        return $this->hasMany(Article::class, 'author_id')->orderBy('created_at', 'desc')->where('status', 'Draft');
    }
}
