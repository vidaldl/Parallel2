<?php

namespace App\Portfolio;

use Illuminate\Database\Eloquent\Model;
use App\Portfolio\PortfolioItem;

class PortfolioCategory extends Model
{
    protected $fillable = ['name'];

    public function portfolio_item () {
      return $this->belongsToMany(PortfolioItem::class);
    }
}
