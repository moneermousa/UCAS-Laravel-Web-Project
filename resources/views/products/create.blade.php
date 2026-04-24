@extends('layouts.main')

@section('title', 'New Product')


@section('main_content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <i class="fa-solid fa-xmark me-2"></i> {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                <h1 class="display-4">Add New Product</h1>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <div class="mt-2 text-center">
                            <img id="img-preview" class="card-img-top img-thumbnail mt-2" src="" alt="Product Image" style="max-width: 100%; display: none; border-radius: 8px; border: 1px solid #ddd;">
                        </div>

                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        
                        {{-- <div class="mt-2 text-center">
                            <img id="img-preview" src="#" alt="Preview" style="max-width: 100%; height: 150px; display: none; border-radius: 8px; border: 1px solid #ddd;">
                        </div> --}}
                    </div>

                    <input type="text" name="name" id="name" class="form-control input-me mt-3" placeholder="Product Name" required>
                    <input type="text" name="description" id="description" class="form-control input-me mt-3" placeholder="Description" required>
                    <input type="number" min="1" max="999999" name="price" id="price" class="form-control input-me mt-3" placeholder="Price" required>
                    <button type="submit" id="add" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-plus me-1"></i> Add New Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection