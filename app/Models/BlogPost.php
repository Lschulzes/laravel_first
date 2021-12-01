<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
  protected $fillable = ['title', 'content'];
  use HasFactory;
  use SoftDeletes;

  public function comments()
  {
    return $this->hasMany('App\Models\Comment');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public static function boot()
  {
    parent::boot();
    static::deleting(fn (BlogPost $post) => self::onDelete($post));
    static::restoring(fn (BlogPost $post) => self::onRestore($post));
  }

  public static function onDelete(BlogPost $post)
  {
    $post->comments()->delete();
  }

  public static function  onRestore(BlogPost $post)
  {
    $post->comments()->delete();
  }
}
