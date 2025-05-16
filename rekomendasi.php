<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi UKM</title>
    <link rel="stylesheet" href="rekomendasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        /* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Navbar */
.navbar {
    background-color: #27a844;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}
  
  .user-info {
    display: flex;
    align-items: center;
  }

.user-info {
    display: flex;
    align-items: center;
}

.user-icon {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.user-details {
    color: white;
}

.user-name {
    font-weight: bold;
    font-size: 14px;
}

.user-nim {
    font-size: 12px;
}

.title {
    color: white;
    font-size: 20px;
    font-weight: bold;
}

.menu-icons {
    display: flex;
    align-items: center;
}

.menu-icon {
    width: 24px;
    height: 24px;
    margin-left: 15px;
}

/* Main Content */
.main-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.form-container {
    border: 2px solid #1fa13a;
    border-radius: 10px;
    padding: 30px;
    width: 100%;
    max-width: 600px;
    text-align: center;
}

.form-title {
    color: #1fa13a;
    margin-bottom: 20px;
    font-size: 24px;
}

.interests-form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.checkbox-grid {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
    width: 100%;
}

.column {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.column label {
    margin-bottom: 15px;
    color: #1fa13a;
    font-weight: bold;
}

.submit-button {
    background-color: #1fa13a;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

.submit-button:hover {
    background-color: #14862e;
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
  
.profile .icon {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}
.nav-icons .icon {
    width: 24px;
    margin-left: 15px;
}
.profile-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.profile-info i {
    font-size: 2rem;
}
.temukan-button {
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

    <main class="main-container">
        <div class="form-container">
            <h2 class="form-title">Minat Bakat</h2>
            <form class="interests-form">
                <div class="checkbox-grid">
                    <div class="column">
                        <label><input type="checkbox" name="minat" value="Olahraga"> Olahraga</label>
                        <label><input type="checkbox" name="minat" value="Seni"> Seni</label>
                        <label><input type="checkbox" name="minat" value="Musik"> Musik</label>
                        <label><input type="checkbox" name="minat" value="Keagamaan"> Keagamaan</label>
                    </div>
                    <div class="column">
                        <label><input type="checkbox" name="minat" value="Karya Tulis"> Karya Tulis</label>
                        <label><input type="checkbox" name="minat" value="Menggambar"> Menggambar</label>
                        <label><input type="checkbox" name="minat" value="Beladiri"> Beladiri</label>
                        <label><input type="checkbox" name="minat" value="Teknologi"> Teknologi</label>
                    </div>
                </div>
                <a href="rekomendasiukm.html" class="temukan-button">Temukan</a>
            
            </form>
        </div>
    </main>
</body>
</html>
