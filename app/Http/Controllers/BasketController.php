<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BasketController extends CalculationController
{
    public function index()
    {
        $basket    = Session::get('basket');
        $result    = [];

        if ($basket !== null) {
            foreach ($basket as $product_id => $quantity) {
                $product = Product::find($product_id);

                if ($product !== null) {
                    $sum     = $product->price * $quantity;

                    $result[] = [
                        'product'  => $product,
                        'quantity' => $quantity,
                        'sum'      => $sum,
                    ];
                }
            }
        }

        return view('basket.index', ['basket' => $result, 'total_sum' => $this->getTotalSum()]);
    }

    public function add(Request $request)
    {
        $basket = Session::get('basket');

        if ($basket === null) {
            Session::put('basket', [
                $request->json()->get('id') => (int) $request->json()->get('quantity')
            ]);
        } else {
            $product_id = (int)  $request->json()->get('id');
            $quantity   = (int)  $request->json()->get('quantity');

            if (isset($basket[$product_id]) === true) {
                $basket[$product_id] += $quantity;
            } else {
                $basket[$product_id] = $quantity;
            }

            Session::put('basket', $basket);
        }

        return response()->json(['count' => $this->getCountItems()]);
    }

    public function count(Request $request)
    {
        $basket = Session::get('basket');
        $count  = 0;

        if ($basket !== null) {
            foreach ($basket as $quantity) {
                $count += $quantity;
            }
        }

        return response()->json(['count' => $count]);
    }

    public function update(Request $request)
    {
        $basket    = Session::get('basket');

        $basket[$request->json()->get('id')] = $request->json()->get('quantity');

        Session::put('basket', $basket);

        return response()->json(['total_sum' => $this->getTotalSum(), 'count' => $this->getCountItems()]);
    }

    public function remove(int $id)
    {
        $basket = Session::get('basket');

        unset($basket[$id]);

        Session::put('basket', $basket);

        return response()->json(['message' => 'success', 'total_sum' => $this->getTotalSum(), 'count' => $this->getCountItems()]);
    }


}
