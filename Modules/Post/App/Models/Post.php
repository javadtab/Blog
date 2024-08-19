<?php

namespace Modules\Post\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Post\Database\factories\PostFactory;
/////
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Modules\Users\App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

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

   public function comments()
   {
      return $this->hasMany(Comment::class)->whereNull('parent_id');
   }
}
