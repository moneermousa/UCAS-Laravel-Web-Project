@extends('layouts.main')

@section('title', 'Show Product')


@section('main_content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">

                <h1 class="display-4">Show Product</h1>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger pt-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" class="form-control input-me" placeholder="Product ID" value="{{ $products->id }}" hidden>

                    <img class="card-img-top img-thumbnail mt-2" src="{{ asset($products->image) }}" alt="{{ $products->name }}" style="width:100%">
                    
                    <div class="mt-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control input-me" placeholder="Product Name" value="{{ $products->name }}" disabled>
                    </div>
                    
                    <div class="mt-3">
                        <label class="form-label" for="description">Product Description</label>
                        <textarea name="description" id="description" class="form-control input-me" rows="5" disabled>{{ $products->description }}</textarea>
                    </div>
                    
                    <div class="mt-3">
                        <label class="form-label" for="price">Product Price</label>
                        <input type="text" name="price" id="price" class="form-control input-me" placeholder="Price" value="{{ $products->price }}" disabled>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="quantity">Products Quantity</label>
                        <input type="number" min="1" max="100" name="quantity" id="quantity" class="form-control input-me" placeholder="Quantity" value="1" required>
                    </div>
                    
                    <input type="submit" class="form-control input-me mt-3 text-light bg-dark" value="Order Now">
                </form>
                
                @if(auth()->user()?->isAdmin())
                    <a href="{{ route('products.edit', $products->id) }}" class="btn btn-secondary w-100 mt-3 text-decoration-none">
                        Edit Product
                    </a>
                    
                    <form action="{{ route('products.destroy', $products->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="form-control input-me mt-3 text-light bg-danger" value="Delete Product">
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection