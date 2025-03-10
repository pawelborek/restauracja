<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$serwer = "localhost";
$uzytkownik = "root";
$haslo = "";
$baza = "bigfoodforyou";

$conn = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);

if (!$conn) {
    die("Połączenie z bazą danych nieudane: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Użytkownik nie znaleziony.";
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - BigFoodForYou</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../profile.css">
</head>
<body>
    <header id="nawigacja">
        <nav id="navbar">
            <div class="logo">
                <a href="../index.php">BigFoodForYou</a>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Strona główna</a></li>
                <li><a href="../pages/menu.php">Menu</a></li>
                <li><a href="profil.php"><i class="fi fi-br-circle-user"></i> Profil</a></li>
                <li><a href="logout.php">Wyloguj się</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="profile-container">
            <h2>Twój profil</h2>
            <p><strong>Nazwa użytkownika:</strong> <?php echo $user['username']; ?></p>
        </div>
    </main>

    <footer id="stopka">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>O nas</h2>
            <p>BigFoodForYou to restauracja, która łączy pasję do gotowania z najlepszymi składnikami. Oferujemy wyśmienite dania, które wprowadzą Cię w kulinarne uniesienia.</p>
        </div>
        <div class="footer-section contact">
            <h2>Kontakt</h2>
            <ul>
                <li>Adres: ul. Smakowa 12, 00-123 Warszawa</li>
                <li>Telefon: +48 22 123 45 67</li>
                <li>E-mail: kontakt@bigfoodforyou.pl</li>
            </ul>
        </div>
        <div class="footer-section social">
            <h2>Śledź nas</h2>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
    </div>
    </footer>
</body>
</html>
