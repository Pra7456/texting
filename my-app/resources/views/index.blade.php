@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>People List</h1>
        <a href="{{ route(']create') }}" class="btn btn-primary mb-3">Add New</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td>
                            @if($person->image)
                                <img src="{{ asset('storage/' . $person->image) }}" alt="Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->email }}</td>
                        <td>{{ $person->city }}</td>
                        <td>
                            <a href="{{ route('edit', $person->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('destroy', $person->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection