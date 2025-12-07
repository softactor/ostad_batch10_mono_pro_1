@extends('backend.layout.app')
@section('title', 'Admin Product List')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product List</h5>

        <a href="{{ route('admin.product.create') }}">New Product</a>

        @if($products->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)

                <tr>
                    <th scope="row">1</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>
                        <img src="{{ asset('storage/public/products/'.$product->product_image) }}" alt="{{$product->name}}" title="{{$product->name}}" height="100">
                        
                    </td>
                    <td>
                        <a href="">Edit</a> 
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        @endif
    </div>
</div>



@endsection