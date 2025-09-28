@include('navbar')


<h1 class="text-center ">CRUD Form with Multiple Inputs</h1>
<hr>
<div class="container m-2 d-flex justify-content-end"><a class="btn btn-primary" href="{{ asset('add') }}">Add
        Data <i class="fa-solid fa-plus"></i></a> </div>
<hr>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mob</th>
            <th>Email</th>
            <th>User ID</th>
            <th>Password</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <!-- Entries will show here -->
    </tbody>
</table>

@include('footer')