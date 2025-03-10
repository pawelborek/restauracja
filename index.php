<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigFoodForYou</title>
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
</head>
<body>
    <header id="nawigacja">
        <nav id="navbar">
            <div class="logo">
                <a href="index.php">BigFoodForYou</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="pages/menu.php">Menu</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="pages/profil.php"><i class="fi fi-br-circle-user"></i> Profil</a></li>
                <?php else: ?>
                    <li><a href="pages/login.php">Zaloguj się</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <div class="img-container">
            <img src="img/baner.webp" alt="herobanner" height="750px" width="100%">
            <a href="pages/menu.php"><button class="center-button">Zobacz menu</button></a>
        </div>

        <h1 id="oNas">O nas</h1>
        
        <p>Witaj w <b>BigFoodForYou</b>, miejscu, gdzie pasja do gotowania spotyka się z wyjątkową atmosferą. Naszym celem jest serwowanie pysznych dań przygotowanych z najlepszych, świeżych składników – zawsze z dbałością o jakość i smak. Zainspirowani tradycją i nowoczesnymi trendami kulinarnymi, tworzymy menu, które zadowoli każdego. Zapraszamy do wspólnego odkrywania smaków, które na długo pozostaną w pamięci.</p>

        <hr>

        <h1>Kontakt</h1>

        <p>Masz pytania lub chcesz dokonać rezerwacji? Skontaktuj się z nami!</p>
        <ul>
            <li>Adres: ul. Smakowa 12, 00-123 Warszawa</li>
            <li>Telefon: +48 22 123 45 67</li>
            <li>E-mail: kontakt@restauracjasmakowa.pl</li>
        </ul>

        <p>skorzystaj z poniższego formularza, aby wysłać wiadomość bezpośrednio do nas:</p>

        <div class="contact-form">
            <h2>Skontaktuj się z nami!</h2>
            <form action="pages/kontakt.php" method="POST">
                <label for="name">Imię</label>
                <input type="text" id="imie" name="imie" required>

                <label for="nazwisko">Nazwisko</label>
                <input type="text" name="nazwisko" id="nazwisko" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Telefon:</label>
                <input type="tel" id="tel" name="tel">

                <label for="message">Wiadomość:</label>
                <textarea id="wiadomosc" name="wiadomosc" rows="4" required></textarea>

                <label for="prywatnosc">Wyrażam zgodę na przetwarzanie moich danych osobowych w celu odpowiedzi na zapytanie.</label>
                <input type="checkbox" id="prywatnosc" name="prywatnosc" required> 

                <button type="submit" name="wyslij">Wyślij wiadomość</button>
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

    <script src="script.js"></script>
</body>
</html>