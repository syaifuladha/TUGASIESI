<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran UKM</title>
  <link rel="stylesheet" href="kirim.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: white;
  }
  
  .navbar {
    background-color: #27a844;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 20px;
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
  
  .form-container {
    padding: 30px;
    margin: 20px;
    border: 2px solid #27a844;
    border-radius: 8px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
  }
  
  .ukm-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  
  .form-input {
    padding: 10px;
    border-radius: 6px;
    border: none;
    background-color: #e0e0e0;
    font-size: 14px;
    resize: none;
  }
  
  .submit-btn {
    background-color: #27a844;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    box-shadow: 1px 2px 3px rgba(0,0,0,0.2);
  }

  .profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.profile-info i {
    font-size: 2rem;
}
.kirim-button {

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
  .form-container .text{
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

  <main class="form-container">
    <form class="ukm-form">
      <select class="form-input">
        <option>> UKM PILIHAN </option>
        <option>UKM Pagar Nusa</option>
        <option>UKM Tapak Suci</option>
        <option>UKM Musik</option>
      </select>

      <input type="text" class="form-input" placeholder="Nomor HP/WA" required>
      <textarea class="form-input" placeholder="Motivasi masuk" required></textarea>

      <div class="text">
      <a href="bayar.php" class="kirim-button">Kirim</a>
    </div>
    </form>
  </main>
</body>
</html>
