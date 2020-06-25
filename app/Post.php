<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'title', 'description', 'contenido', 'image', 'published_at', 'category_id', 'button' ,'link'
    ];

    protected $dates = ['created_at', 'published_at'];

    public function deleteImage() {

      Storage::delete($this->image);

    }

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function tags() {
      return $this->belongsToMany(Tag::class);
    }




// Check if post has tags
// @return bool
//
    // public function hasTag($tagId) {
    //
    //   return in_array($tagId, $this->tags->pluck('id')->toArray());
    //
    // }


}
