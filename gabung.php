<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>UKM Pagar Nusa</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
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
  
  .profile .icon {
    width: 40px;
    height: 40px;
    margin-right: 10px;
  }
  
  .info {
    line-height: 1.2;
  }
  
  .nav-icons .icon {
    width: 24px;
    margin-left: 15px;
  }
  
  h1 {
    margin: 0;
    font-size: 20px;
  }
  
  .content-box {
    padding: 20px;
    border: 2px solid #27a844;
    margin: 20px;
    border-radius: 8px;
  }
  
  .ukm-box {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
    width: 100%;
    
  }
  .content-box .text{
    text-align: center;
  
    
  }
  
  .ukm-logo {
    width: 100px;
  }
  
  .ukm-content h2 {
    margin: 0 0 5px 0;
    color: #27a844;
  }
  
  .kategori {
    color: #27a844;
    font-weight: 600;
    margin: 0 0 10px 0;
  }
  
  .deskripsi {
    color: #333;
    line-height: 1.5;
  }
  
  .join-btn {
    display: block;
    margin: 0 auto;
    background-color: #27a844;
    color: white;
    border: none;
    padding: 10px 30px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
  }
  .profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.profile-info i {
    font-size: 2rem;
}

.gabung-button {

    text-decoration: none;
    background-color: #28a745;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
  }
  .profile-icon {
    font-size: 40px;
    margin-right: 10px;
}
.profile-name {
    font-weight: bold;
}
.profile-id {
    font-size: 12px;
}
.profile {
    display: flex;
    align-items: center;
}
.profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
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
.nav-icons {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 24px;
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

  <main class="content-box">
    <div class="ukm-box">
      <img src="PNLOGO.png" alt="Logo Pagar Nusa" class="ukm-logo"/>
      <div class="ukm-content">
        <h2>UKM Pagar Nusa</h2>
        <p class="kategori">Beladiri, Seni, Keagamaan, Olahraga</p>
        <p class="deskripsi">
          UKM Pagar Nusa merupakan Unit Kegiatan Mahasiswa pada UIN Raden Intan Lampung
          yang berfokus pada beladiri pencak silat. UKM ini tidak hanya bertujuan untuk
          melatih keterampilan fisik dan bela diri, tetapi juga menanamkan nilai-nilai
          spiritual, etika, dan rasa kebangsaan yang tinggi kepada anggotanya.
        </p>
      </div>
    </div>
    <div class="text">
      <a href="kirim.php" class="gabung-button">Gabung</a>
    </div>
  </main>
</body>
</html>
