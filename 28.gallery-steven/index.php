<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #000;
            color: #fff;
            overflow: hidden;
        }
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(45deg, #111, #333, #000);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
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
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        header h1 {
            font-size: 36px;
            margin: 0;
            padding: 20px 0;
        }
        nav {
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #ffc107;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: left;
        }
        th {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: normal;
        }
        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: auto;
        }
        .button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #ffc107;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ff9800;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <div class="container">
        <header>
            <h1>Halaman Landing</h1>
            <nav>
                <ul>
                    <?php
                        session_start();
                        if(!isset($_SESSION['userid'])){
                    ?>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                    <?php
                        }else{
                    ?>   
                            <li><a href="index.php">Home</a></li>
                            <li><a href="album.php">Album</a></li>
                            <li><a href="foto.php">Foto</a></li>
                            <li><a href="logout.php">Logout</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>
        </header>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Uploader</th>
                    <th>Jumlah Like</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
                    while($data=mysqli_fetch_array($sql)){
                ?>
                    <tr>
                        <td><?=$data['fotoid']?></td>
                        <td><?=$data['judulfoto']?></td>
                        <td><?=$data['deskripsifoto']?></td>
                        <td>
                            <img src="gambar/<?=$data['lokasifile']?>" alt="<?=$data['judulfoto']?>">
                        </td>
                        <td><?=$data['namalengkap']?></td>
                        <td>
                            <?php
                                $fotoid=$data['fotoid'];
                                $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($sql2);
                            ?>
                        </td>
                        <td>
                            <a href="like.php?fotoid=<?=$data['fotoid']?>" class="button">Like</a>
                            <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="button">Komentar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
