<!DOCTYPE html>
<html>

<head>
    <title>CRUD Operation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select {
            padding: 8px;
            width: 300px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>

    <h1>CRUD Operation</h1>

    {{-- Form to Add New Person --}}
    <!-- <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>First Name:</label>
        <input type="text" name="name" required>

        <label>Last Name:</label>
        <input type="text" name="last_name" required>

        <label>Date:</label>
        <input type="date" name="date" required>

        <label>Image:</label>
        <input type="file" name="image">

        <label>City:</label>
        <input type="text" name="city" required>

        <br><br>
        <button type="submit">Add New</button>
    </form> -->

    {{-- Table of People --}}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Date</th>
                <th>Image</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <!-- @foreach ($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->date }}</td>
                    <td>
                        @if ($person->image)
                            <img src="{{ asset('storage/' . $person->image) }}" alt="Image">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $person->city }}</td>
                </tr>
            @endforeach -->
        </tbody>
    </table>

</body>

</html>