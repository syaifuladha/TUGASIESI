<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Profile</title>
  <link rel="stylesheet" href="updateprofil.css">
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
  display: flex;
  justify-content: center;
  margin-top: 30px;
}

.profile-box {
  border: 2px solid #079f3b;
  border-radius: 10px;
  padding: 20px;
  width: 90%;
  max-width: 500px;
  text-align: center;
}

.profile-image img {
  width: 80px;
  height: 80px;
  margin-bottom: 20px;
  background-color: #079f3b;
  border-radius: 50%;
  padding: 10px;
}

.profile-form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.profile-form label {
  text-align: left;
  font-size: 14px;
  color: #333;
}

.profile-form input {
  border: 2px solid #079f3b;
  border-radius: 6px;
  padding: 8px;
  font-size: 14px;
  color: #079f3b;
  background-color: #fff;
}

.text {
  margin-top: 20px;
  text-align: center;
}

.anggota-button {
  background-color: #43B02A;
  color: white;
  border: none;
  padding: 10px 30px;
  border-radius: 7px;
  font-size: 16px;
  cursor: pointer;
  text-decoration: none;
} 
.container .text{
    text-align: center;
  
    
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

        <h1 class="welcome">Profil Anggota</h1>

        <div class="nav-icons">
            <a href="home.php"><i class="fas fa-home"></i>
        </a>
            
        </div>
</header>
 <main class="container">
    <div class="profile-box">
      <div class="profile-image">
        
      </div>

      <form class="profile-form">
        <label>Nama</label>
        <input type="text" value="Ahmad Anjay Akbar" readonly>

        <label>NPM</label>
        <input type="text" value="2271020086" readonly>

        <label>E-Mail</label>
        <input type="text" value="ahmadanjay@student.radenintan.ac.id" readonly>

        <label>Jenis Kelamin</label>
        <input type="text" value="Laki-Laki" readonly>

        <label>Alamat</label>
        <input type="text" value="Jl. Pulau Bawaan 1, Sukarame, Bandar Lampung" readonly>

        <label>Fakultas</label>
        <input type="text" value="Sains & Teknologi" readonly>

        <label>Program Studi</label>
        <input type="text" value="Sistem Informasi" readonly>

       <div class="text">
      <a href="anggota.php" class="anggota-button">Keluarkan</a>
    </div>
      </form>
    </div>
  </main>
 

</body>
</html>
