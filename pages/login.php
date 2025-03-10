<?php
session_start();

$serwer = "localhost";
$uzytkownik = "root";
$haslo = "";
$baza = "bigfoodforyou";


$conn = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);

if (!$conn) {
    die("Połączenie z bazą danych nieudane: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../index.php'); 
            exit;
        } else {
            $error_message = "Błędna nazwa użytkownika lub hasło.";
        }
    } else {
        $error_message = "Błędna nazwa użytkownika lub hasło.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - BigFoodForYou</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../login.css">
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
                <li><a href="login.php">Zaloguj się</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="login-form">
            <h2>Logowanie</h2>
            <form action="login.php" method="POST">
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Hasło:</label>
                <input type="password" name="password" id="password" required>

                <a href="register.php">Nie masz konta? Zarejestruj się tutaj</a>

                <?php
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
                ?>

                <button type="submit">Zaloguj się</button>
            </form>
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
mysqli_close($conn);
?>
