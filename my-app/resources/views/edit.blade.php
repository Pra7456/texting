@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Person</h1>
        <form action="{{ route('people.update', $person->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $person->name) }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $person->email) }}">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>City:</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $person->city) }}">
                @error('city') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Image:</label><br>
                @if($person->image)
                    <img src="{{ asset('storage/' . $person->image) }}" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="image" class="form-control">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('people.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection