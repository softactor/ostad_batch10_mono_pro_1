@extends('backend.layout.app')
@section('title', 'Admin Category Create')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Category List</h5>

        <a href="{{ route('admin.categories.index') }}">Back Category List</a>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i>Create New Product
                        </h4>
                        <p class="text-muted mb-0">Add a new Category to your inventory</p>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Category name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description"  class="form-control" id="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="status" class="form-label">Status</label>

                                    <select name="status" id="status" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inctive</option>

                                    </select>
                                    
                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-outline-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>



    @endsection