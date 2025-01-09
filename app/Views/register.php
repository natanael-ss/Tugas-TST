<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script>
        async function submitForm(event) {
            event.preventDefault(); // Cegah form submit default
            const form = event.target;

            // Ambil data form
            const formData = {
                username: form.username.value,
                email: form.email.value,
                password: form.password.value,
                role: form.role.value
            };

            // Kirim data sebagai JSON menggunakan fetch
            const response = await fetch('/auth/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            // Tangani respon dari server
            const result = await response.json();
            if (response.ok) {
                alert(result.message); // Sukses
            } else {
                alert(result.message || 'Registration failed'); // Gagal
            }
        }
    </script>
</head>
<body>
    <h2>Register</h2>
    <form onsubmit="submitForm(event)">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
