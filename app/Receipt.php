<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop\ShopItem;
class Receipt extends Model
{
    protected $fillable = [
      'receipt_number',
      'description',
      'date',
      'client_name',
      'client_email',
      'method',
      'card_type',
      'card_last4',
      'subtotal',
      'tax',
      'total',
      'payment_status',
      'recurring_id'
    ];

    public function getPaidAttribute() {
    if ($this->payment_status == 'Invalid') {
        return false;
      }
      return true;
    }


    public function shop_items() {
      return $this->belongsToMany(ShopItem::class)->withPivot('item_qty');
    }
}
