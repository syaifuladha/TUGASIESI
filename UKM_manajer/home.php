<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
.header {
    background-color: #28a745;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    color: white;
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
main {
  padding: 20px;
}

.card {
  display: flex;
  border: 2px solid #43B02A;
  border-radius: 10px;
  padding: 20px;
  align-items: flex-start;
  gap: 20px;
}

.logo-ukm img {
  width: 120px;
  height: auto;
  border: 2px solid #43B02A;
  padding: 5px;
  background-color: #fff;
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
  background-color: #2E7D32;
  color: #ffffff;
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

.lihat-anggota button {
  background-color: #43B02A;
  color: white;
  border: none;
  padding: 10px 30px;
  border-radius: 7px;
  font-size: 16px;
  cursor: pointer;
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
        <button class="edit-button" onclick="Edit">Edit</button>
        <p class="kategori">Beladiri, Seni, Keagamaan, Olahraga</p>
        <p class="detail">
          UKM Pagar Nusa merupakan Unit Kegiatan Mahasiswa pada UIN Raden Intan Lampung yang berfokus pada beladiri pencak silat.
          UKM ini tidak hanya bertujuan untuk melatih keterampilan fisik dan bela diri, tetapi juga menanamkan nilai-nilai spiritual, etika,
          dan rasa kebangsaan yang tinggi kepada anggotanya.
        </p>
        <div class="lihat-anggota">
          <button onclick="lihatanggota">Lihat Anggota</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>