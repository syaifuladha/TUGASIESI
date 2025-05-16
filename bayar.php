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
  
  .navbar {
    background-color: #27a844;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }
  
  .profile {
    display: flex;
    align-items: center;
  }
  
  .profile .icon {
    width: 35px;
    height: 35px;
    margin-right: 10px;
  }
  
  .info {
    line-height: 1.2;
  }
  
  .nav-icons .icon {
    width: 24px;
    margin-left: 15px;
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
    padding: 10px 30px;
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
