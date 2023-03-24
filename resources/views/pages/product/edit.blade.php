@extends('layouts.app')

@section('title')
    Edit Product
@endsection

@section('content')
    <form class="mt-5" method="POST" action="{{ route('product.update',$items->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-4">
                <label for="categories_id" class="form-label">Category</label>
                <select class="form-select" name="categories_id" aria-label="Default select example">
                    <option hidden>Select Category</option>
                    @foreach ($category as $c)
                    <option value="{{ $c->id}}" {{ $c->id == $items->category->id ? 'selected' : '' ; }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label for="name" class="form-label">Product Title</label>
                <input type="text" value="{{ $items->name }}" class="form-control" name="name" id="name" required>
            </div>

            @error('name')
                <div class="invalid-feedback">
                    Name cannot be empty
                </div>
            @enderror

        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" value="{{ $items->description }}" name="description" class="form-control" id="description" required>
            </div>

            @error('description')
                <div class="invalid-feedback">
                    Description cannot be empty
                </div>
            @enderror

        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" value="{{ $items->price }}" name="price" class="form-control" id="price" required>
            </div>

            @error('price')
                <div class="invalid-feedback">
                    Price cannot be empty
                </div>
            @enderror

        </div>

        <div class="row mt-3">
            <div class="col-4">
                <label for="photo" class="form-label">Image Product</label>
                <input type="file" name="photo" class="form-control">
            </div>

            @error('icon')
                <div class="invalid-feedback">
                    Icon cannot be empty
                </div>
            @enderror

        </div>

        <button type="submit" class="btn mt-3 btn-primary">Submit</button>
    </form>
@endsection
