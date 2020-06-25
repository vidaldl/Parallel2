<?php

namespace App\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Portfolio\PortfolioCategory;

class PortfolioItem extends Model
{
    use SoftDeletes;

    public function deleteLogo() {

      Storage::delete($this->Logo);

    }

    public function deleteScreenshot() {

      Storage::delete($this->screenshot);

    }

    protected $fillable = [
      'title',
      'subtitle',
      'image'
    ];

    public function portfolio_category() {
      return $this->belongsToMany(PortfolioCategory::class);
    }
}
