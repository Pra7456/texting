<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD Form with Multiple Inputs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

</body>

<h1>CRUD Form with Multiple Inputs</h1>

<form id="crudForm" enctype="multipart/form-data">
    <div>
        <label for="name">Name *</label>
        <input type="text" id="name" required />
    </div>
    <div>
        <label for="number">Number *</label>
        <input type="number" id="number" required />
    </div>
    <div>
        <label for="email">Email *</label>
        <input type="email" id="email" required />
    </div>
    <div>
        <label for="idInput">ID *</label>
        <input type="text" id="idInput" required />
    </div>
    <div>
        <label for="password">Password *</label>
        <input type="password" id="password" required />
    </div>
    <div>
        <label for="cpassword">Confirm Password *</label>
        <input type="password" id="cpassword" required />
    </div>
    <div>
        <label for="image">Upload Image *</label>
        <input type="file" id="image" accept="image/*" required />
    </div>
    <button type="submit" id="submitBtn">Add</button>
</form>

<!-- JS -->
<script src="{{ asset('js/script.js') }}"></script>

</body>



</html>