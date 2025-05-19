<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login UKM</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="header">
    <div class="header-content">
      <div class="text">
        <h1>SISTEM<br>REKOMENDASI PEMILIHAN UNIT<br>KEGIATAN MAHASISWA</h1>
      </div>
      <div class="image">
        <img src="9703.jpg" alt="Gambar UKM">
      </div>
    </div>
  </div>

  <div class="login-form">
    <form action="proses_login.php" method="POST">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="password" name="password">
      <button type="submit" class="login-button">LOGIN</button>
    </form>
  </div>

</body>
</html>
