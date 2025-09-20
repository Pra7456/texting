@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Person</h1>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>City:</label>
                <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                @error('city') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image" class="form-control">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection