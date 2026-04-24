@extends('layouts.main')

@section('title', 'Products')


@section('main_content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-around">
            <h2 class="text-center mb-4">Products List</h2>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($products as $product)
                <div class="card col-12 shadow mt-3 mb-3" style="width:400px">
                    <img class="card-img-top img-thumbnail mt-2" src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{ Str::limit($product->name, 50, '...') }}</h4>
                        <p class="card-text">{{ Str::limit($product->description, 50, '...') }}</p>
                        <p class="card-text text-black-50">{{ $product->price }}$</p>
                        <a href="{{ route('products.show', $product->id) }}"><button class="btn btn-primary" id="orderBtn" onclick="">Show More</button></a>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection