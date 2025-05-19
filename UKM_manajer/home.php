<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
<body>
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

.deskripsi h2 {
  color: #2E7D32;
  margin-bottom: 5px;
}

.kategori {
  font-weight: bold;
  color: #388E3C;
  margin-bottom: 10px;
}

.detail {
  text-align: justify;
  color: #333;
}

.edit-button {
  margin-top: 10px;
  background-color: #E0F2F1;
  color: #2E7D32;
  border: 1px solid #2E7D32;
  padding: 6px 12px;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  justify-content: end;
}

.lihat-anggota {
  margin-top: 20px;
  text-align: center;
}

.btn-edit:hover, .btn-view:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
    <header class="header">
        <div class="profile">
            <a href="profil.php">
                <i class="fas fa-user-circle profile-icon"></i>
                <div class="profile-info">
                    <div class="profile-name">UKM Manajer</div>
                   
                </a>
            </div>
            </a>
        </div>

        <h1 class="welcome">Selamat datang UKM Manajer</h1>

        <div class="nav-icons">
            <a href="notif.php"><i class="fa-solid fa-bell"></i>
        </a>
            
        </div>
</header>
<main>
    <div class="card">
      <div class="logo-ukm">
        <img src="PNLOGO.png" alt="Logo Pagar Nusa"/>
      </div>
      <div class="deskripsi">
        <h2>UKM Pagar Nusa</h2>
        <p class="kategori">Beladiri, Seni, Keagamaan, Olahraga</p>
        <p class="detail">
          UKM Pagar Nusa merupakan Unit Kegiatan Mahasiswa pada UIN Raden Intan Lampung yang berfokus pada beladiri pencak silat.
          UKM ini tidak hanya bertujuan untuk melatih keterampilan fisik dan bela diri, tetapi juga menanamkan nilai-nilai spiritual, etika,
          dan rasa kebangsaan yang tinggi kepada anggotanya.
        </p>
        <div style="display: flex; justify-content: end;">
        <button class="edit-button" onclick="Edit">Edit</button>
          <div class="lihat-anggota">
              <button onclick="lihatanggota">Lihat Anggota</button>
          </div>
        </div>
      </div>
    </div>

  </main>
</body>
</html>