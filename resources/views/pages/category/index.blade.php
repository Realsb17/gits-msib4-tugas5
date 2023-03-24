@extends('layouts.app')

@section('title')
    All Categories
@endsection

@section('content')
<a class="btn mt-5 btn-primary" href="{{route('category.create') }}" role="button">Add Category</a>
{{-- row --}}
<div class="row mt-3">
    @foreach ($item as $c)
    {{-- col --}}
    <div class="mt-2 mb-5 col-md-2">
        {{-- card --}}
        <div class="card text-center">
            <img src="{{ asset('storage/' . $c->icon)}}" class="card-img-top rounded w-100" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $c->name }}</h5>
                <p class="card-text">{{ $c->description }}</p>
                <form action="{{ route('category.destroy', $c->id) }}"  method="POST">
                    <a href="{{ route('category.edit',$c->id) }}" class="btn btn-warning">Edit</a>
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        {{-- end card --}}
    </div>
    {{-- end col --}}
    @endforeach
</div>
{{-- end row --}}
@endsection
