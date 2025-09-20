@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Person Details</h1>

        <div class="card" style="max-width: 500px;">
            <div class="card-body">

                @if($person->image)
                    <img src="{{ asset('storage/' . $person->image) }}" alt="Image" class="img-fluid mb-3"
                        style="max-height: 200px;">
                @else
                    <p>No image available</p>
                @endif

                <p><strong>ID:</strong> {{ $person->id }}</p>
                <p><strong>Name:</strong> {{ $person->name }}</p>
                <p><strong>Email:</strong> {{ $person->email }}</p>
                <p><strong>City:</strong> {{ $person->city }}</p>

                <a href="{{ route('people.edit', $person->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('people.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection