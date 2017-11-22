<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
	public function posts(){
		return $this->hasMany(Post::class, 'user_id');
	}

	public function resume()
	{
		return $this->hasOne(Resume::class);
	}
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

    public function toArray(){
		return [
			'name'  => $this->name,
			'email' => $this->email,
			'data'  => $this->data,
			'resume'=>$this->resume,

		];

	}
}
