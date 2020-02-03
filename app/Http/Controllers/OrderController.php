<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OrderController extends CalculationController
{
    public function create()
    {
        return view('order.create', ['total_sum' => $this->getTotalSum()]);
    }

    public function postCreate(Request $request)
    {
        $order = new Order(['user_id' => Auth::user()->id, 'address' => $request->input('address'), 'total_sum' => $this->getTotalSum()]);

        $basket = Session::get('basket');
        $attachArray = [];

        foreach ($basket as $product_id => $qt) {
            $product = Product::find($product_id);
            $attachArray[$product_id] = ['quantity' => $qt, 'product_sum' => $product->price];
        }

        $order->save();

        $order->products()->attach($attachArray);

        return redirect('/');

    }

    public function all()
    {
        $orders = Order::all();
        return view('order.all', ['orders' => $orders]);
    }
}
