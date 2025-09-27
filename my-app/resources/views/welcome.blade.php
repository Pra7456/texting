<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD Form with Multiple Inputs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1>CRUD Form with Multiple Inputs</h1>


    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Numbe aar</th>
                <th>Email</th>
                <th>ID</th>
                <th>Password</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <!-- Entries will show here -->
        </tbody>
    </table>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>