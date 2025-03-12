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

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Pobieranie szczegółów dania
    $sql = "SELECT * FROM menu WHERE id = $item_id";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total_price = $item['cena']; // Cena dania

    // Zapisanie zamówienia do tabeli 'orders'
    $sql = "INSERT INTO orders (total_price, created_at, email, address, name, item_id) 
            VALUES ('$total_price', NOW(), '$email', '$address', '$name', '$item_id')";
    if ($conn->query($sql) === TRUE) {
        echo"<script language='javascript'>
                alert('Dziękujęmy za złożenie zamówienia!');
            </script>
            ";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienie - BigFoodForYou</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../zamowienie.css">
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

    <h1>Zamówienie</h1>
    <h2><?php echo $item['nazwa']; ?></h2>
    <p><?php echo $item['opis']; ?></p>
    <p><strong>Cena:</strong> <?php echo $item['cena']; ?> PLN</p>

    <div class="contact-form-container">
        <form action="zamowienie.php?item_id=<?php echo $item_id; ?>" method="POST" class="contact-form">
            <h2>Złóż zamówienie</h2>
            
            <label for="name">Imię:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="address">Adres:</label>
            <textarea name="address" id="address" rows="4" required></textarea>

            <button type="submit">Złóż zamówienie</button>
        </form>
    </div>

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
