<?php

namespace App\PortfolioGallery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PortfolioGallery\GalleryImages;

class GalleryItem extends Model
{
  use SoftDeletes;

  public function gallery_images() {
    return $this->belongsToMany(GalleryImages::class);
  }
}
