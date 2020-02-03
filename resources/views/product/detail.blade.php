@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <div class="card" style="width: 18rem; float: left; margin: 10px">
                    <img class="card-img-top" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-subtitle">{{ $product->price }} $</h5>
                        <p class="card-text">{{ $product->description }}</p>

                            <div class="form-group">
                                <label for="qt">Qt:</label>
                                <input type="number" id="qt" class="form-control" min="1" max="100" name="quantity" value="1">
                            </div>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-primary" id="buy" value="Buy" data-product="{{ $product->id }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
