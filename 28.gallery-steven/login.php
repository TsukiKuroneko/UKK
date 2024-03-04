<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #111, #333, #000);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            color: #fff;
            overflow: hidden;
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            text-align: center;
        }
        .form-table {
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
        }
        .form-table td {
            padding: 10px;
        }
        .form-table input[type="text"],
        .form-table input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .form-table input[type="text"]:focus,
        .form-table input[type="password"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .form-table input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff8c00;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-table input[type="submit"]:hover {
            background-color: #d18e00;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    <form action="proses_login.php" method="post">
        <table class="form-table">
            <tr>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>
