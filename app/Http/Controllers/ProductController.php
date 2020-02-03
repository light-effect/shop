<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{
    public function create()
    {
        return view('product.create');
    }

    public function postCreate(Request $request)
    {
        $product = new Product($request->input());

        $file = $request->file('image');

        $filename = str_replace('.' . $file->getClientOriginalExtension(), '', $file->getClientOriginalName()) . '_' . time();
        $extension = $file->getClientOriginalExtension();

        Storage::disk('public')->put($filename . '.' . $extension, File::get($file));

        $product->image = $filename . '.' . $extension;

        $product->save();

        return redirect('/');
    }

    public function update(int $id)
    {
        $product = Product::find($id);

        return view('product.update', ['product' => $product]);
    }

    public function postUpdate(Request $request)
    {

        $product = Product::find($request->input('id'));

        $product->update($request->input());

        return redirect('/');
    }

    public function get(int $id)
    {
        $product = Product::find($id);

        return view('product.detail', ['product' => $product]);
    }

    public function search(Request $request)
    {
        sleep(5);
        $products = Product::where('name', 'like', '%' . $request->json()->get('search') . '%')->limit(2)->get();

        return response()->json(['products' => $products]);
    }
}
