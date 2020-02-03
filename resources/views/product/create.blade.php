@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center">
                <h3>Create product</h3>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control required" id="name" name="name">
                    </div>
                    <div class="form-group">

                        <label for="category">Category</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach(\App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="number" class="form-control required" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="submit" class="btn btn-primary check-required">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
