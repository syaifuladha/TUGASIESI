<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        main {
            padding: 20px;
        }

        .ukm {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
        }

        .ukm h2 {
            color: #4CAF50;
        }

        .btn-edit, .btn-view {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-edit:hover, .btn-view:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Selamat datang UKM Manajer</h1>
    <div class="user-info">
        <span><?php echo $_SESSION['user']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</header>

<main>
    <section class="ukm">
        <h2><?php echo $ukm_name; ?></h2>
        <p><strong>Beladiri, Seni, Keagamaan, Olahraga</strong></p>
        <p><?php echo $ukm_description; ?></p>
        <button class="btn-edit" onclick="window.location.href='edit.php'">Edit</button>
        <button class="btn-view" onclick="window.location.href='members.php'">Lihat Anggota</button>
    </section>
</main>

<footer>
    <p>&copy; 2023 UKM Manajer. All rights reserved.</p>
</footer>

</body>
</html>
