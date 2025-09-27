        const form = document.getElementById('crudForm');
        const nameInput = document.getElementById('name');
        const numberInput = document.getElementById('number');
        const emailInput = document.getElementById('email');
        const idInput = document.getElementById('idInput');
        const passwordInput = document.getElementById('password');
        const cpasswordInput = document.getElementById('cpassword');
        const imageInput = document.getElementById('image');
        const submitBtn = document.getElementById('submitBtn');
        const tableBody = document.getElementById('tableBody');

        let entries = [];
        let editIndex = null;

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // Validation
            if (passwordInput.value !== cpasswordInput.value) {
                alert('Passwords do not match!');
                return;
            }

            if (!imageInput.files[0] && editIndex === null) {
                alert('Please upload an image');
                return;
            }

            const reader = new FileReader();

            if (imageInput.files[0]) {
                reader.readAsDataURL(imageInput.files[0]);
            } else {
                // If editing and image not changed, skip FileReader
                submitEntry(null);
            }

            reader.onload = () => {
                submitEntry(reader.result);
            };

        });

        function submitEntry(imageDataUrl) {
            const entryData = {
                name: nameInput.value.trim(),
                number: numberInput.value.trim(),
                email: emailInput.value.trim(),
                id: idInput.value.trim(),
                password: passwordInput.value.trim(),
                image: imageDataUrl,
            };

            if (editIndex === null) {
                // Add new
                entries.push(entryData);
            } else {
                // Update existing, keep old image if no new image uploaded
                if (imageDataUrl) {
                    entries[editIndex] = entryData;
                } else {
                    entries[editIndex] = {
                        ...entryData,
                        image: entries[editIndex].image,
                    };
                }
                editIndex = null;
                submitBtn.textContent = 'Add';
            }

            form.reset();
            renderTable();
        }

        function renderTable() {
            tableBody.innerHTML = '';

            entries.forEach((entry, index) => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
        <td>${entry.name}</td>
        <td>${entry.number}</td>
        <td>${entry.email}</td>
        <td>${entry.id}</td>
        <td>${'*'.repeat(entry.password.length)}</td>
        <td><img src="${entry.image}" alt="User Image" /></td>
        <td class="actions">
          <button class="edit">Edit</button>
          <button class="delete">Delete</button>
        </td>
      `;

                // Edit button
                tr.querySelector('.edit').addEventListener('click', () => {
                    loadEntryForEdit(index);
                });

                // Delete button
                tr.querySelector('.delete').addEventListener('click', () => {
                    if (confirm('Are you sure you want to delete this entry?')) {
                        entries.splice(index, 1);
                        if (editIndex === index) {
                            form.reset();
                            editIndex = null;
                            submitBtn.textContent = 'Add';
                        }
                        renderTable();
                    }
                });

                tableBody.appendChild(tr);
            });
        }

        function loadEntryForEdit(index) {
            const entry = entries[index];
            nameInput.value = entry.name;
            numberInput.value = entry.number;
            emailInput.value = entry.email;
            idInput.value = entry.id;
            passwordInput.value = entry.password;
            cpasswordInput.value = entry.password;
            // Image input cannot be prefilled for security reasons — user must upload again if want to change
            imageInput.value = '';
            editIndex = index;
            submitBtn.textContent = 'Update';
        }