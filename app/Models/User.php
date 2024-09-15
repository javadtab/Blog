<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Modules\Post\App\Models\Post;

class User extends  Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    public function posts()
    {
        return $this->hasMany(Post::class , 'user_id');
    }
    protected $fillable = [
        'name',
        'ip',
        'email',
        'phonenumber',
        'password',
    ];
    protected $guard_name = 'web';

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
