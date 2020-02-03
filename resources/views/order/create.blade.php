@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center">
                <h3>Create order</h3>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <ul id="results"></ul>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div>
                        <strong>Total sum: <span id="total-sum">{{ $total_sum }}</span> $</strong>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
