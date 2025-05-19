<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UKM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .header {
            background-color: #28a745;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            color: white;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile-icon {
            font-size: 40px;
            margin-right: 10px;
        }

        .profile-info {
            line-height: 1.2;
        }

        .profile-name {
            font-weight: bold;
        }

        .profile-id {
            font-size: 12px;
        }

        .welcome {
            font-size: 20px;
            margin: 0;
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 24px;
        }

        .main-content {
            margin: 30px auto;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            border: 2px solid #28a745;
            border-radius: 10px;
            text-align: center;
        }

        .card {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .menu-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
            background: none;
            border: 2px solid #28a745;
            border-radius: 8px;
            font-size: 16px;
            color: #28a745;
            cursor: pointer;
        }

        .menu-button i {
            font-size: 18px;
        }

        .main-content a{
            text-decoration: none;
            text-decoration-line: none;
            background-color: #fff;
        }

        .menu-button:hover {
            background-color: #28a745;
            color: white;
        }

        .menu-button {
            background-color: #ffffff;
            border: 1px solid #28a745;
            border-radius: 8px;
            padding: 10px;
            color: #28a745;
            font-weight: bold;
            cursor: pointer;
        }

        .menu-button-gabung {
            background-color: #28a745;
            border-radius: 8px;
            padding: 10px;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            border: 0;
        }

        .join-button:hover {
            background-color: #218838;
        }
        .profile a{
            text-decoration: none;
             text-decoration-line: none;
             color: inherit;
        }
        .nav-icons a{
            text-decoration: none;
             text-decoration-line: none;
             color: inherit;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="profile">
            <a href="profil.php">
                <i class="fas fa-user-circle profile-icon"></i>
                <div class="profile-info">
                    <div class="profile-name">Abdul Walid</div>
                    <div class="profile-id">2271020064</div>
                </a>
            </div>
        </div>

        <h1 class="welcome">Selamat datang Walid</h1>

        <div class="nav-icons">
            <a href="login.php"><i class="fas fa-home"></i>
        </a>
            
        </div>
    </header>

    <main class="main-content">
        <div class="card">
            <button class="menu-button" onclick="window.location.href='rekomendasi.php'">Rekomendasi UKM</button>
            
            <button class="menu-button" onclick="window.location.href='listukm.php'">List Daftar UKM</button>

            <button class="menu-button-gabung" onclick="window.location.href='kirim.php'"> Gabung UKM</button>
        </div>
    </main>

</body>
</html>
