<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>List Daftar UKM</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
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

.user-info {
  margin-left: 10px;
  color: white;
}

.user-name {
  font-weight: bold;
  font-size: 14px;
}

.user-id {
  font-size: 12px;
}
  
  .title {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-weight: bold;
    font-size: 18px;
  }
  
  .nav-icons {
    display: flex;
    gap: 10px;
  }
  
  .nav-icon {
    width: 24px;
    height: 24px;
  }
  
  .content {
    max-width: 600px;
    margin: 20px auto;
    padding: 15px;
    border: 2px solid #2e7d32;
    border-radius: 8px;
  }
  
  h2 {
    text-align: center;
    color: #2e7d32;
  }
  
  .ukm-card {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    padding: 10px;
    margin: 8px 0;
    border-radius: 5px;
  }
  .ukm-list a {
  text-decoration: none;
  }
  .ukm-title {
  font-weight: bold;
  color: #28a745;
  font-size: 18px;
}

.ukm-subtitle {
  font-size: 14px;
  color: gray;
  margin-top: 5px;
}

  .ukm-card img {
    width: 50px;
    height: 50px;
    margin-right: 15px;
  }
  
  .ukm-card h3 {
    margin: 0;
    color: #2e7d32;
  }
  
  .ukm-card p {
    margin: 3px 0 0;
    font-size: 13px;
    color: #555;
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
            </a>
        </div>
    
    <div class="nav-icons">
            <a href="index.php"><i class="fas fa-home"></i>
        </a>
            
        </div>
    
  </div>
</header>
<br>
<div class="title">List Daftar UKM</div>
<br>
  <div class="content">
    <h2>Daftar UKM UIN RIL</h2>
    
    <div class="ukm-list">
     <a href="gabung.php" class="ukm-card">
          <img src="PNLOGO.png" alt="Pagar Nusa" class="ukm-logo">
          <div class="ukm-info">
            <div class="ukm-title">UKM Pagar Nusa</div>
            <div class="ukm-subtitle">Beladiri, Seni, Keagamaan, Olahraga</div>
          </div>
          
        </a>

    <div class="ukm-list">
      <a href="" class="ukm-card">
        <img src="ts.png" alt="Tapak Suci" class="ukm-logo">
          <div class="ukm-info">
            <div class="ukm-title">UKM Tapak Suci</div>
            <div class="ukm-subtitle">Beladiri, Seni, Keagamaan, Olahraga</div>
          </div>
          </a>
    </div>

    <div class="ukm-list">
      <a href="" class="ukm-card">
        <img src="inkai.png" alt="UKM INKAI">
      <div class="ukm-info">
            <div class="ukm-title">UKM INKAI</div>
            <div class="ukm-subtitle">Beladiri, Seni, Olahraga</div>
          </div>
          </a>
    </div>
     

    <div class="ukm-list">
      <a href="" class="ukm-card">
      <img src="hiqma.jpeg" alt="UKM HIQMA">
      <div class="ukm-info">
            <div class="ukm-title">UKM HIQMA</div>
            <div class="ukm-subtitle">Seni, Musik, Keagamaan, Membaca</div>
      </div>
          </a>
    </div>
    

    <div class="ukm-list">
      <a href="" class="ukm-card">
      <img src="bahasa.jpeg" alt="UKM Bahasa">
      <div class="ukm-info">
            <div class="ukm-title">UKM Bahasa</div>
            <div class="ukm-subtitle">Seni, Karya, Tulis,</div>
      </div>
          </a>
    </div>

    <div class="ukm-list">
      <a href="" class="ukm-card">
      <img src="Puskima.jpeg" alt="UKM PUSKIMA">
      <div class="ukm-info">
            <div class="ukm-title">UKM PUSKIMA</div>
            <div class="ukm-subtitle">Literasi dan Tulis,</div>
      </div>
          </a>
    </div>
     

  </div>
</body>
</html>
