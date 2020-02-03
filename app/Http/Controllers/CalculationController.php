<?php


namespace App\Http\Controllers;

use App\Product;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class CalculationController extends BaseController
{
    protected function getTotalSum()
    {
        $total_sum = 0;
        $basket    = Session::get('basket');

        if ($basket !== null) {
            foreach ($basket as $product_id => $quantity) {
                $product = Product::find($product_id);
                $sum = 0;

                if ($product !== null) {
                    $sum     = $product->price * $quantity;
                }

                $total_sum += $sum;
            }
        }

        return $total_sum;
    }

    protected function getCountItems()
    {
        $count  = 0;
        $basket = Session::get('basket');

        foreach ($basket as $quantity) {
            $count += $quantity;
        }

        return $count;
    }
}
