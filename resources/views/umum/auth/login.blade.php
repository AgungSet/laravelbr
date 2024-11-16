<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Katalog Muria Batik</title>
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

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-container h3 {
            margin-bottom: 20px;
            font-size: 10px;
            color: #333;
        }

        .login-container p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container button {
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

        .login-container button:hover {
            background-color: #c9a12c;
        }

        .register-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
        }

        .register-link:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3>Silahkan Login Terlebih dahulu</h3>
        <h2>Login Katalog Muria Batik</h2>
        <p>Masukkan username dan password Anda</p>
        <form action="{{ route('umum.loginpost') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('umum.register') }}" class="register-link">Register</a>
        <p>Silahkan yang belum mempunyai akun bisa register terlebih dahulu</p>
    </div>
</body>

</html>
