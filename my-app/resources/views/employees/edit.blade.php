@extends('layouts.app')

@section('content')

    <h1>Edit Employee</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')

        <label>First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}">

        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $employee->email) }}">

        <label>City</label>
        <input type="text" name="city" value="{{ old('city', $employee->city) }}">

        <br><br>
        <button type="submit">Update Employee</button>
    </form>

    <a href="{{ route('employees.index') }}">Back to List</a>

@endsection