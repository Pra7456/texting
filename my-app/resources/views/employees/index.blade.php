@extends('layouts.app')

@section('content')

    <h1>Employees List</h1>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <a href="{{ route('employees.create') }}">Add Employee</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
                <tr>
                    <td>{{ $emp->first_name }}</td>
                    <td>{{ $emp->last_name }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->city }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $emp->id) }}">Edit</a> |
                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection