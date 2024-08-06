<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;
class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , Commentable ;

    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'title',
        'description',
       // 'image',
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
