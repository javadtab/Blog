<?php

namespace App\Models;


use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;




class User extends Authenticatable
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
