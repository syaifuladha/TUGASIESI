<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
<body>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 10px 0;
}

main {
    padding: 20px;
}

.ukm {
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
}

.ukm h2 {
    color: #4CAF50;
}

.btn-edit, .btn-view {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.btn-edit:hover, .btn-view:hover {
    background-color: #45a049;
}

    <header>
        <h1>UKM Manajer</h1>
    </header>
    <main>
        <section class="ukm-details">
            <h2>UKM Pagar Nusa</h2>
            <p>Beladiri, Seni, Keagamaan, Olahraga</p>
            <p>
                UKM Pagar Nusa merupakan Unit Kegiatan Mahasiswa pada UIN Raden Intan Lampung
                yang berfokus pada beladiri pencak silat. UKM ini tidak hanya bertujuan untuk
                melatih keterampilan fisik dan bela diri, tetapi juga menanamkan nilai-nilai
                spiritual, etika, dan rasa kebangsaan yang tinggi kepada anggotanya.
            </p>
            <button onclick="location.href='lihat_anggota.php'">Lihat Anggota</button>
            <button onclick="location.href='edit.php'">Edit</button>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 UKM Manajer</p>
    </footer>
</body>
</html>