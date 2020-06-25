<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PricingItem;

class Pricing extends Model
{
  protected $fillable = [
    'lista'
  ];

  public function pricing_item() {
    return $this->belongsToMany(PricingItem::class);
  }
}
