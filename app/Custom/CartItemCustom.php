<?php
namespace App\Custom;
use \Gloudemans\Shoppingcart\CartItem;
class CartItemCustom extends CartItem{
    public function dummy(): string
    {
        return 'dummy';
    }
}
