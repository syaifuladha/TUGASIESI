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
h1 {
    margin: 0;
    font-size: 20px;
  }
.container {
  padding: 20px;
  display: flex;
  justify-content: center;
  color: #079f3b;
}

.anggota-list {
  width: 90%;
  max-width: 700px;
}

.anggota-item {
  border: 2px solid #079f3b;
  border-radius: 6px;
  padding: 10px;
  margin-bottom: 10px;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: center;
  font-size: 14px;
  background-color: #fff;

}

.anggota-item span {
  flex: 1;
  min-width: 120px;
}

.detail-link {
  color: #079f3b;
  font-size: 13px;
  text-decoration: none;
  border: 1px solid #079f3b;
  padding: 3px 6px;
  border-radius: 4px;
  transition: 0.2s;
}

.detail-link:hover {
  background-color: #079f3b;
  color: white;
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

        <h1 class="welcome">Anggota</h1>

        <div class="nav-icons">
            <a href="notif.php"><i class="fa-solid fa-bell"></i>
        </a>      
    </div>
</header>
<main class="container">
    <div class="anggota-list">
      <div class="anggota-item">
        <span>1. Ahmad Anjay Mabar</span>
        <span>2271020086</span>
        <span>Sistem Informasi</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
      <div class="anggota-item">
        <span>2. Boby Bachry Rawrrr</span>
        <span>2216622755</span>
        <span>BKPI</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
      <div class="anggota-item">
        <span>3. Doldo Bororo Koar</span>
        <span>22172635614</span>
        <span>Biologi</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
      <div class="anggota-item">
        <span>4. Nora Aora Seora</span>
        <span>22710244444</span>
        <span>Kimia</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
      <div class="anggota-item">
        <span>5. Nurul Tralalelo Tralala</span>
        <span>22615265674</span>
        <span>Pendidikan Militer</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
      <div class="anggota-item">
        <span>6. Tung Sahur Haur Haur</span>
        <span>22444415451</span>
        <span>Hukum Konoha</span>
        <a href="detail.html" class="detail-link">Lihat Detail</a>
      </div>
    </div>
  </main>
</body>
</html>