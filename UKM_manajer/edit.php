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
      max-width: 700px;
      margin: 30px auto;
      border: 2px solid #079f3b;
      border-radius: 12px;
      padding: 25px;
      text-align: center:
    }

    .logo {
      text-align: center;
      margin-bottom: 200pxpx;
    }

    .logo img {
      width: 100px;
      height: auto;
      display: block;
      margin: 0 auto 20px auto;
    }

    .judul {
      text-align: center;
      font-size: 22px;
      color: #079f3b;
      font-weight: bold;
      margin-bottom: 25px;
    }

    .checkbox-area {
      border: 1px solid #079f3b;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      text-align: center;
      color: #079f3b;

    }
    
    
    .checkbox-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 8px;
      justify-content: center;
    }

    label {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 15px;
    }

    .description {
      border: 1px solid #079f3b;
      padding: 15px;
      border-radius: 8px;
      text-align: justify;
      font-size: 14px;
      margin-bottom: 20px;
      
    }
    .description textarea {
        width: 97%;
        padding: 10px;
        font-size: 14px;
        font-family: Arial, sans-serif;
        border: 1px solid #079f3b;
        border-radius: 5px;
        text-align: justify;
    }
    .selesai-button {
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
  .container .text{
    text-align: center;
  }

#logoinput {
  display: block;
  margin : 15px auto ;
}

    </style>
</head>
<body>
    <header class="header">
        <div class="profile">
            <a href="profil.php">
                <i class="fas fa-user-circle profile-icon"></i>
                <div class="profile-info">
                    <div class="profile-name">Update Deskripsi</div>
                   
                </a>
            </div>
            </a>
        </div>

        <h1 class="welcome">Selamat datang UKM Manajer</h1>

        <div class="nav-icons">
            <a href="notif.php"><i class="fa-solid fa-bell"></i>
        </a>
            
        </div>
</header>
<div class="container">
    <div class="logo">
      <img id="Logopreview" src="PNLOGO.png" alt="logo UKM" width="150">
      <input type="file" id="logoinput" accept="image/*">
    </div>
    <div class="judul">UKM Pagar Nusa</div>

    <div class="checkbox-area">
      <h1><strong>Minat Bakat yang Relevan</strong></h1>
      <p>
      <div class="checkbox-grid">
        <label><input type="checkbox" checked> Olahraga</label>
        <label><input type="checkbox"> Karya Tulis</label>
        <label><input type="checkbox" checked> Seni</label>
        <label><input type="checkbox"> Menggambar</label>
        <label><input type="checkbox"> Musik</label>
        <label><input type="checkbox" checked> Beladiri</label>
        <label><input type="checkbox" checked> Keagamaan</label>
        <label><input type="checkbox"> Teknologi</label>
      </div>
    </div>
    </p>

    <div class="description" contenteditable="true">
    <textarea name="deskripsi" rows="6">
UKM Pagar Nusa merupakan Unit Kegiatan Mahasiswa pada UIN Raden Intan Lampung yang berfokus pada beladiri pencak silat.UKM ini tidak hanya bertujuan untuk melatih keterampilan fisik dan bela diri, tetapi juga menanamkan nilai-nilai spiritual,etika, dan rasa tanggung jawab yang tinggi kepada anggotanya.
    </textarea>
    </div>


    <div class="text">
      <a href="home.php" class="selesai-button">Selesai</a>
    </div>
</div>
</body>
</html>

<script>
  document.getElementById('logoInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('logoPreview').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>