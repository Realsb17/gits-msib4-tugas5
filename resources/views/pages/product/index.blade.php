@extends('layouts.app')

@section('title')
    All Products
@endsection

@section('content')
<a class="btn mt-5 btn-primary" href="{{route('product.create') }}" role="button">Add Product</a>
{{-- row --}}
<div class="row mt-3">
    @foreach ($item as $p)
    {{-- col --}}
    <div class="mt-2 mb-5 col-md-3 col-6">
        {{-- card --}}
        <div class="card">
            <img src="{{ asset('storage/' . $p->photo)}}" class="card-img-top" alt="...">
            <div class="card-body">

                <h5 class="card-title">{{ $p->name }}</h5>

                @if ($p->category == NULL)
                <h6 class="card-subtitle text-muted"><i>-Uncategory</i></h6>
                @else
                <h6 class="card-subtitle text-muted"><i>-{{ $p->category->name }}</i></h6>
                @endif

                <p class="card-text">{{ $p->description }}</p>

                <h5 class="d-flex text-danger"><span class="ms-auto">Rp {{ number_format($p->price) }}</span></h5>
                {{-- @auth
                @endauth --}}
                <form action="{{ route('product.destroy', $p->id) }}"  method="POST">
                    <a href="{{ route('product.edit',$p->id) }}" class="btn btn-warning">Edit</a>
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>

                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <input type="hidden" name="products_id" value="{{ $p->id }}">

                        <div class="col-6">
                            <input type="number" class="form-control" required name="qty">
                        </div>

                        <div class="col-6 d-flex">
                            <button type="submit" class="btn btn-primary ms-auto" role="button"><i class="fa-solid fa-cart-plus"></i></button>
                        </div>

                    </div>
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
