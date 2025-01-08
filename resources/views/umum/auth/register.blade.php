<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Katalog Muria Batik</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .register-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .register-container p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #D4AF37;
            /* Gold color */
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .register-container button:hover {
            background-color: #c9a12c;
        }

        .login-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
        }

        .login-link:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>Register Katalog Muria Batik</h2>
        <p>Silakan isi data Anda untuk mendaftar</p>
        <form action="{{ route('umum.registerpost') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="nama_customer" placeholder="Nama Customer" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="no_hp" placeholder="No. Hp" required>
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('umum.login') }}" class="login-link">Sudah punya akun? Login</a>
    </div>
</body>


</html>
