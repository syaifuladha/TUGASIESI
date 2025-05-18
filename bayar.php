<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran UKM</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  
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

  

  
  .payment-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
  }
  
  .payment-box {
    background-color: white;
    border: 2px solid #27a844;
    border-radius: 8px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  
  .qrcode {
    width: 200px;
    height: 200px;
    margin-bottom: 15px;
  }
  
  .note {
    font-size: 14px;
    color: #333;
  }
  
  .profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.profile-info i {
    font-size: 2rem;
}
.sudahbayar-button {

    text-decoration: none;
    background-color: #28a745;
    color: white;
    padding: 5px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
  
  }
  .payment-container .text{
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
                    <div class="profile-name">Abdul Walid</div>
                    <div class="profile-id">2271020064</div>
                </a>
            </div>
            </a>
        </div>

        <h1 class="welcome">Selamat datang Walid</h1>

        <div class="nav-icons">
            <a href="index.php"><i class="fas fa-home"></i>
        </a>
            
        </div>
</header>

  <main class="payment-container">
    <div class="payment-box">
      <img src="barcode.png" alt="QR Code" class="qrcode">
      <p class="note">
        Silahkan melakukan proses pembayaran dengan <br> menggunakan scan barcode ini
      </p>
      <div class="text">
        <a href="sukses.html" class="sudahbayar-button">Sudah Bayar</a>
      </div>
    </div>
  </main>
</body>
</html>
