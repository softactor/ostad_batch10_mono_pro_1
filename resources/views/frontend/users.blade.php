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


            
                @if($users->isNotEmpty())


                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Total users</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">{{ $totalUsers }}</h6>
                    </div>
                  </div>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php 

                        $sl = 1;

                      @endphp

                      @foreach($users as $user)

                      <tr>
                        <th scope="row">{{ $sl++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                          @php 
                              $editUrl = url("/user/$user->id");
                          @endphp

                          <a href="{{ $editUrl }}" class="nav-item">Edit</a>

                        </td>
                      </tr>

                      @endforeach

                    </tbody>
                  </table>

                  {{ $users->links('pagination::bootstrap-5')  }}

                  @endif

          </div>
      </div>


    </div>




@endsection