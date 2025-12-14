@extends('backend.layout.app')
@section('title', 'Admin Category List')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Category List</h5>

        <a href="{{ route('admin.categories.create') }}">New Category</a>

        @if($categories->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @php 
                    $sl = 1;
                @endphp

                @foreach($categories as $category)

                <tr id="{{'category_id_'.$category->id}}">
                    <th scope="row">{{ $sl++ }}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->status}}</td>
                    <td>
                        @php  
                            $editUrl = 'admin/categories/'.$category->id.'/edit'
                        @endphp
                        <a href="{{ url($editUrl) }}">Edit</a> 
                        <button type="button" class="btn btn-danger btn-sm" onclick="sweetAlert('<?php echo $category->id; ?>')">Delete</button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        @endif
    </div>
</div>



@endsection