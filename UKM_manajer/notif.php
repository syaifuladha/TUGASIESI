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

.notification-card {
  border: 2px solid #43B02A;
  border-radius: 10px;
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.notif-left {
  display: flex;
  align-items: center;
  font-size: 30px;
  color : #28a745;
  margin-right: 15px;
}

.notif-left img {
  width: 50px;
  margin-right: 15px;
}

.notif-text .title {
  font-weight: bold;
  color: #2E7D32;
  margin: 0;
}

.notif-text .name {
  margin: 2px 0 0;
  font-size: 14px;
  color: #444;
}

.notif-time {
  text-align: right;
  font-size: 13px;
  color: #333;
}

.notif-left i{
  font-size: 2rem;
  color: #28a745;
  padding-right: 1.5rem;
}

.notif-time .jam {
  margin-top: 4px;
}
 h1 {
    margin: 0;
    font-size: 20px;
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

        <h1 class="welcome">Notifikasi</h1>

        <div class="nav-icons">
            <a href="home.php"><i class="fas fa-home"></i>
        </a>
            
        </div>
</header>
    <main>
    <div class="notification-card">
      <div class="notif-left">
        <i class="fa-solid fa-circle-check"></i>
        <div class="notif-text">
        
          <p class="title">Pembayaran registrasi telah masuk</p>
          <p class="name">Ahmad Zulaifa Alfanrda</p>
        </div>
        
      </div>
      <div class="notif-time">
        <p>20 Mei 2025</p>
        <p class="jam">13:42 WIB</p>
      </div>
    </div>

    <div class="notification-card">
      <div class="notif-left">
        <i class="fa-solid fa-circle-check"></i>
        <div class="notif-text">
          <p class="title">Pembayaran registrasi telah masuk</p>
          <p class="name">Keisya Alvaro</p>
        </div>
      </div>
      <div class="notif-time">
        <p>18 Mei 2025</p>
        <p class="jam">13:42 WIB</p>
      </div>
    </div>

    <div class="notification-card">
      <div class="notif-left">
        <i class="fa-solid fa-circle-check"></i>
        <div class="notif-text">
          <p class="title">Pembayaran registrasi telah masuk</p>
          <p class="name">Ruben Diaz</p>
        </div>
      </div>
      <div class="notif-time">
        <p>13 Mei 2025</p>
        <p class="jam">13:42 WIB</p>
      </div>
    </div>
</body>
</html>