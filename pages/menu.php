<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bigfoodforyou";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobieranie danych z tabeli menu
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - BigFoodForYou</title>
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header id="nawigacja">
        <nav id="navbar">
            <div class="logo">
                <a href="../index.php">BigFoodForYou</a>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Strona główna</a></li>
                <li><a href="menu.php">Menu</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profil.php"><i class="fi fi-br-circle-user"></i> Profil</a></li>
                <?php else: ?>
                    <li><a href="login.php">Zaloguj się</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

<main>
    <h1>Menu</h1>

    <div class="menu-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="menu-item">
                <img src="../img/<?php echo $row['obrazek']; ?>" alt="<?php echo $row['nazwa']; ?>">
                <div class="item-info">
                    <h2><?php echo $row['nazwa']; ?></h2>
                    <p><?php echo $row['opis']; ?></p>
                    <div class="price"><?php echo $row['cena']; ?> PLN</div>
                    <a href="zamowienie.php?item_id=<?php echo $row['id']; ?>" class="order-button">Zamów</a>
                </div>
            </div>
        <?php endwhile; ?>
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

<?php
$conn->close();
?>
