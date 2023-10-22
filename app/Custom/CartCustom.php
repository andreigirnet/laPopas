<?php
namespace App\Custom;
use \Gloudemans\Shoppingcart\Cart;
class CartCustom extends Cart{
    public function dummy(): string
        {
            return 'dummy';
        }
}
