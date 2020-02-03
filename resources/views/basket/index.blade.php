@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sum</th>
                        <th scope="col">Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($basket as $number => $row)
                        <tr>
                            <th scope="row">{{ $number + 1 }}</th>
                            <td>{{ $row['product']->name }}</td>
                            <td>
                                <div class="form-group">
                                    <input type="number" style="width: 75%!important" class="form-control d-inline basket-qt-input" name="basket[{{ $row['product']->id }}]" value="{{ $row['quantity'] }}" min="1" data-product="{{ $row['product']->id }}"> pcs.
                                </div>
                            </td>
                            <td>{{ $row['product']->price }} $</td>
                            <td>{{ $row['sum'] }} $</td>
                            <td><a href="#" class="delete" data-product="{{ $row['product']->id }}">delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                <div>
                    <strong>Total sum: <span id="total-sum">{{ $total_sum }}</span> $</strong>
                </div>

                <div>
                    <a class="btn btn-primary" href="/order/create">Make order</a>
                </div>
            </div>
        </div>
    </div>

@endsection
