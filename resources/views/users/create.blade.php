@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card mt-3">
                <div class="card-header"><h2 class="text-center">Create user</h2></div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                <div class="wrapper">
                    <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
