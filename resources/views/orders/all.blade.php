@extends('layouts.main')

@section('title', 'Your Orders')


@section('main_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Orders List</h2>
        
        <div class="table-responsive rounded">

            @if(auth()->user()?->isAdmin())
                <table class="table table-hover table-bordered text-center rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Ordered At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- for each -->
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>{{ $order->created_at }}</td>
                                @if ($order->status == 'completed')
                                    <td><span class="badge bg-success">Completed</span></td>

                                @elseif ($order->status == 'pending')
                                    <td><span class="badge bg-warning">Pending</span></td>

                                @else
                                    <td><span class="badge bg-danger">Canceled</span></td>
                                @endif
                                <td>
                                    <a href="{{ route('products.show', $order->product->id) }}"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Cancel" onclick="return confirm('Are You Sure?')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('orders.update', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Complete" onclick="return confirm('Are You Sure?')">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            @else
                <table class="table table-hover table-bordered text-center rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Ordered At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- for each -->
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>{{ $order->created_at }}</td>
                                @if ($order->status == 'completed')
                                    <td><span class="badge bg-success">Completed</span></td>

                                @elseif ($order->status == 'pending')
                                    <td><span class="badge bg-warning">Pending</span></td>

                                @else
                                    <td><span class="badge bg-danger">Canceled</span></td>
                                @endif
                                <td>
                                    <a href="{{ route('products.show', $order->product->id) }}"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Cancel" onclick="return confirm('Are You Sure?')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            @endif
            {{ $orders->links(); }}
        </div>
    </div>
@endsection