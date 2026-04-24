@extends('layouts.main')

@section('title', 'Users List')


@section('main_content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Users List</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Is Admin</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            @if ($user->is_admin == 0)
                                <td><span class="badge bg-primary">User</span></td>
                            @else
                                <td><span class="badge bg-success">Admin</span></td>
                            @endif
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="delete" onclick="return confirm('Are You Sure?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $users->links(); }}
        </div>
    </div>
@endsection