<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pricing;

class PricingItem extends Model
{
  protected $fillable = [
    'lista'
  ];

  public function Pricing() {
    return $this->belongsToMany(Pricing::class);
  }
}
