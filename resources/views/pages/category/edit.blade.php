@extends('layouts.app')

@section('title')
    Edit Category
@endsection

@section('content')
    <form class="mt-5" method="POST" action="{{ route('category.update',$items->id) }}" enctype="multipart/form-data">
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
                <label for="name" class="form-label">Category Title</label>
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
                <label for="description" class="form-label">Category Description</label>
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
                <label for="icon" class="form-label">Icon Category</label>
                <input type="file" name="icon" class="form-control">
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
