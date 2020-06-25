<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\ShopItem;
use Cart;
use App\Shop\ShopSection;
use App\Order;
use App\Font;
use App\FontStyle;
use App\FooterLink;
use App\Style;
use App\MenuItem;
use App\ContenidoSectionFooter;

class ShoppingController extends Controller
{


    public function add_to_cart(Request $request) {
      $id = $request->input('pdt_id');
      $pdt = ShopItem::find($id);


      $cartItem = Cart::add([
        'id' => $pdt->id,
        'name' => $pdt->title,
        'qty' => $request->quantity,
        'price' => $pdt->precio,
        'weight' => $pdt->weight
      ]);

      Cart::associate($cartItem->rowId, 'App\Shop\ShopItem');

      return redirect()->route('cart');
      // dd(Cart::content());


    }

    public function showCart() {

      return view('shop.cart')
      ->with('orders', Order::all())
      ->with('menu_item', MenuItem::all())
      ->with('styles', Style::all())
      ->with('fonts', Font::all())
      ->with('font_styles', FontStyle::all())
      ->with('contenidosectionfooters', ContenidoSectionFooter::all())
      ->with('footer_links', FooterLink::all())
      ->with('shop_items', ShopItem::all());
    }

    public function cartDelete($id) {
      Cart::remove($id);

      return redirect()->back();
    }

    public function incr($id, $qty) {
      Cart::update($id, $qty + 1);

      return redirect()->back();
    }

    public function decr($id, $qty) {
      Cart::update($id, $qty - 1);

      return redirect()->back();
    }

    public function qtyUpdate(Request $request, $id) {
      $qty = $request->input('quantity');

      Cart::update($id, $qty);
      return redirect()->back();
    }

    public function quickAdd($id) {
      $pdt = ShopItem::find($id);


      $cartItem = Cart::add([
        'id' => $pdt->id,
        'name' => $pdt->title,
        'qty' => 1,
        'price' => $pdt->precio,
        'weight' => $pdt->weight
      ]);

      Cart::associate($cartItem->rowId, 'App\Shop\ShopItem');

      return redirect('/#shop');
      // dd(Cart::content());


    }

    public function quickAddDetail($id) {
      $pdt = ShopItem::find($id);


      $cartItem = Cart::add([
        'id' => $pdt->id,
        'name' => $pdt->title,
        'qty' => 1,
        'price' => $pdt->precio,
        'weight' => $pdt->weight
      ]);

      Cart::associate($cartItem->rowId, 'App\Shop\ShopItem');

      return redirect()->back();
      // dd(Cart::content());


    }
}
