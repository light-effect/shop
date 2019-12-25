@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <h3>{{ $category->name }}</h3>
                @foreach($category->products as $product)
                    <div class="card" style="width: 18rem; float: left; margin: 10px">
                        <img class="card-img-top" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h5 class="card-subtitle">{{ $product->price }} $</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="#" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
