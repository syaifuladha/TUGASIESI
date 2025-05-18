<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
  }
  
  .navbar {
    background-color: #27a844;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .navbar h2 {
    margin: 0;
    font-size: 20px;
  }
  
  .container {
    display: flex;
    justify-content: center;
    padding: 30px;
  }
  
  .profile-box {
    border: 2px solid #27a844;
    border-radius: 10px;
    padding: 30px 20px;
    text-align: center;
    background-color: white;
  }
  
  .user-icon {
    width: 80px;
    margin-bottom: 20px;
  }
  
  .info-box {
    border: 2px solid #27a844;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    color: #27a844;
    font-size: 14px;
  }
  
  .info-box a {
    color: #27a844;
    text-decoration: none;
  }
  
  .ukm-list-box {
    border: 2px solid #27a844;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    color: #27a844;
    font-size: 14px;
  }
  
  .ukm-list {
    margin-top: 10px;
    border: 1px solid #27a844;
    padding: 8px;
    font-weight: bold;
  }

  .profile-box{
    font-size: 7rem;
    color: #000000;
  
  }
  .update-button {

    text-decoration: none;
    background-color: #28a745;
    color: white;
    padding: 5px 12px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    font-size: 15px;
  }
.nav-icons a{
    text-decoration: none;
    text-decoration-line: none;
    color: inherit;
    
}
  </style>
</head>
<body>

  <!-- Header -->
  <header class="navbar">
    <h2>Profile</h2>
    <div class="nav-icons">
            <a href="index.php"><i class="fas fa-home"></i>
        </a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container">
    <div class="profile-box">
        <i class="fa-solid fa-user"></i>
      <div class="info-box">
        
        <strong>ABDUL WALID</strong><br>
        2271020064<br>
        <a href="mailto:abdulwalid@student.radenintan.ac.id">abdulwalid@student.radenintan.ac.id</a><br>
        Sains dan Teknologi<br>
        S1 Sistem Informasi
      </div>

      <div class="ukm-list-box">
        <strong>List daftar UKM yang diikuti</strong>
        <div class="ukm-list">
          ! Belum terdaftar !
        </div>
      </div>
      <div class="text">
        <a href="updateprofil.html" class="update-button">Update</a>
      </div>
    </div>
  </main>

</body>
</html>
