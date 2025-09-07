<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px 12px;
            text-align: center;
        }

        button {
            padding: 10px 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>CRUD Application</h1>
    <form id="user-form">
        <input type="text" id="name" placeholder="Name" required>
        <input type="email" id="email" placeholder="Email" required>
        <button type="submit">Add User</button>
    </form>

    <h2>Users List</h2>
    <table id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        // Function to fetch all users
        function fetchUsers() {
            fetch('api.php', { method: 'GET' })
                .then(response => response.json())
                .then(users => {
                    const tableBody = document.querySelector('#users-table tbody');
                    tableBody.innerHTML = '';
                    users.forEach(user => {
                        tableBody.innerHTML += `
                            <tr>
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>
                                    <button onclick="editUser(${user.id})">Edit</button>
                                    <button onclick="deleteUser(${user.id})">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                });
        }

        // Function to create a new user
        document.getElementById('user-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;

            fetch('api.php', {
                method: 'POST',
                body: new URLSearchParams({ name, email })
            })
                .then(response => response.json())
                .then(data => {
                    fetchUsers(); // Refresh the list
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                });
        });

        // Function to delete a user
        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                fetch('api.php', {
                    method: 'DELETE',
                    body: new URLSearchParams({ id })
                })
                    .then(response => response.json())
                    .then(data => fetchUsers()); // Refresh the list
            }
        }

        // Function to edit a user
        function editUser(id) {
            const name = prompt("Enter new name:");
            const email = prompt("Enter new email:");

            if (name && email) {
                fetch('api.php', {
                    method: 'PUT',
                    body: new URLSearchParams({ id, name, email })
                })
                    .then(response => response.json())
                    .then(data => fetchUsers()); // Refresh the list
            }
        }

        // Load users when the page is loaded
        window.onload = fetchUsers;
    </script>
</body>

</html>