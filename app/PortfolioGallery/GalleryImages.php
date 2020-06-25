<?php

namespace App\PortfolioGallery;

use Illuminate\Database\Eloquent\Model;
use App\PortfolioGallery\GalleryItem;

class GalleryImages extends Model
{
  protected $fillable = [
    'image'
  ];

  public function gallery_item() {
    return $this->belongsToMany(GalleryItem::class);
  }
}
