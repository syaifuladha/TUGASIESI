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
  
  .navbar {
    background-color: #219d38;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    position: relative;
  }
  
  .user-info {
    display: flex;
    align-items: center;
  }
  
  .user-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
  }
  
  .user-name {
    font-weight: bold;
  }
  
  .user-npm {
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
  .profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.profile-info i {
    font-size: 2rem;
}
  </style>
</head>
<body>
    <header class="navbar"> 
    <div class="profile">
        
        <div class="profile-info">
            <i class="fa-solid fa-user"></i>
            <div>
                <div class="profile-name">Abdul Walid</div>
                <div class="profile-id">2271020064</div>
            </div>
        </div>
    </div>
    
    <div class="nav-icons">
      <i class="fas fa-home"></i>
      <i class="fas fa-bars"></i>
    </div>
  </div>
</header>
<br>
<div class="title">List Daftar UKM</div>
<br>
  <div class="content">
    <h2>Daftar UKM UIN RIL</h2>
    
    <div class="ukm-card">
      <img src="PNLOGO.png" alt="UKM Pagar Nusa">
      <div>
        <h3>UKM Pagar Nusa</h3>
        <p>Beladiri, Seni, Keagamaan, Olahraga</p>
      </div>
    </div>

    <div class="ukm-card">
      <img src="ts.png" alt="UKM Tapak Suci">
      <div>
        <h3>UKM Tapak Suci</h3>
        <p>Beladiri, Seni, Keagamaan, Olahraga</p>
      </div>
    </div>

    <div class="ukm-card">
      <img src="inkai.png" alt="UKM INKAI">
      <div>
        <h3>UKM INKAI</h3>
        <p>Beladiri, Seni, Olahraga</p>
      </div>
    </div>

    <div class="ukm-card">
      <img src="hiqma.jpeg" alt="UKM HIQMA">
      <div>
        <h3>UKM HIQMA</h3>
        <p>Seni, Keagamaan, Musik, Menggambar</p>
      </div>
    </div>

    <div class="ukm-card">
      <img src="bahasa.jpeg" alt="UKM Bahasa">
      <div>
        <h3>UKM Bahasa</h3>
        <p>Seni, Karya Tulis</p>
      </div>
    </div>

    <div class="ukm-card">
      <img src="Puskima.jpeg" alt="UKM PUSKIMA">
      <div>
        <h3>UKM PUSKIMA</h3>
        <p>Karya Tulis, Seni</p>
      </div>
    </div>

  </div>
</body>
</html>
