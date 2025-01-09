<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        async function submitLoginForm(event) {
            event.preventDefault(); // Mencegah form submit default
            const form = event.target;

            // Ambil data form
            const formData = {
                email: form.email.value,
                password: form.password.value
            };

            // Kirim data sebagai JSON menggunakan fetch
            const response = await fetch('/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            // Tangani respon dari server
            const result = await response.json();
            if (response.ok) {
            //    alert(result.message); // Login berhasil
                // Redirect atau aksi lain sesuai kebutuhan
                window.location.href = '/topik';
            } else {
                alert(result.message || 'Login failed'); // Login gagal
            }
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <form onsubmit="submitLoginForm(event)" method= "post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
