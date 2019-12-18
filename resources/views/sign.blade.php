@extends('layouts.index')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center">
                <h3>Sign Up</h3>

                <form action="" method="post" >
                    <div class="form-group">
                        <label for="first-name">First name</label>
                        <input type="text" class="form-control" id="first-name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="repeat-password">Repeat password</label>
                        <input type="password" class="form-control" id="repeat-password" name="repeat_password">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
