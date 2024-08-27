<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Post\App\Models\Post;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends  Authenticatable
{
    use HasFactory, Notifiable , HasRoles , HasPermissions;

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
