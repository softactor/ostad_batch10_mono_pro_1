@extends('frontend.layout.app')

@section('title', 'Simpleshop-Users')


@section('content')


    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Users</h1>
        <input class="form-control w-25" type="search" placeholder="Search products" aria-label="Search">
      </div>

      <div class="row">
          <div class="col-md-12">


            
                @if($orders->isNotEmpty())


                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Total Orders</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">{{ $totalOrders }}</h6>
                    </div>
                  </div>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Shipping Address</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php 

                        $sl = 1;

                      @endphp

                      @foreach($orders as $order)

                      <tr>
                        <th scope="row">{{ $sl++ }}</th>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->order_created_at }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                          @php 
                              $editUrl = url("/user/$order->order_id");
                          @endphp

                          <a href="{{ $editUrl }}" class="nav-item">Edit</a>

                        </td>
                      </tr>

                      @endforeach

                    </tbody>
                  </table>

                  @endif

          </div>
      </div>


    </div>




@endsection