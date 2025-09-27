<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Simple CRUD Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            margin-left: 10px;
            font-size: 16px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 20px;
        }

        li {
            background: white;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .actions button {
            background-color: #007bff;
            margin-left: 5px;
        }

        .actions button.delete {
            background-color: #dc3545;
        }

        .actions button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h1>Simple CRUD Home Page</h1>
    <input type="text" id="itemInput" placeholder="Add or edit item" />
    <button id="addBtn">Add</button>

    <ul id="itemList">
        <!-- Items will appear here -->
    </ul>

    <script>
        const input = document.getElementById('itemInput');
        const addBtn = document.getElementById('addBtn');
        const itemList = document.getElementById('itemList');

        let editIndex = null;

        // Add or Update item
        addBtn.addEventListener('click', () => {
            const value = input.value.trim();
            if (value === '') return alert('Please enter an item');

            if (editIndex === null) {
                // Add new item
                addItem(value);
            } else {
                // Update existing item
                updateItem(value);
            }

            input.value = '';
            editIndex = null;
            addBtn.textContent = 'Add';
        });

        function addItem(text) {
            const li = document.createElement('li');

            li.innerHTML = `
        <span>${text}</span>
        <div class="actions">
          <button class="edit">Edit</button>
          <button class="delete">Delete</button>
        </div>
      `;

            // Edit button
            li.querySelector('.edit').addEventListener('click', () => {
                input.value = text;
                editIndex = Array.from(itemList.children).indexOf(li);
                addBtn.textContent = 'Update';
            });

            // Delete button
            li.querySelector('.delete').addEventListener('click', () => {
                itemList.removeChild(li);
                // Reset edit if deleting the item being edited
                if (editIndex === Array.from(itemList.children).indexOf(li)) {
                    input.value = '';
                    editIndex = null;
                    addBtn.textContent = 'Add';
                }
            });

            itemList.appendChild(li);
        }

        function updateItem(newText) {
            if (editIndex !== null) {
                const li = itemList.children[editIndex];
                li.querySelector('span').textContent = newText;
            }
        }
    </script>
</body>

</html>