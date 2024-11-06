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
            <div class="card">
                <div class="card-header"><h4 class="text-center">Upload Products</h4></div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description"  class="form-control"></textarea>
                        </div>
                       <div class="mb-3">
                        <label for="">Product Price</label>
                        <input type="text" name="price" class="form-control">
                       </div>
                       <div class="mb-3">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                       </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection