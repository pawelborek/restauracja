<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - BigFoodForYou</title>
    <link rel="stylesheet" href="../menu.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
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
                <li><a href="login.php"><i class="fi fi-br-circle-user"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Menu</h1>


        <div class="menu-category">
            <h2>Przystawki</h2>
            <ul>
                <li>
                    <img src="../img/caprese.jpg" alt="Przystawka 1">
                    <div class="item-name">Sałatka Caprese</div>
                    <div class="item-price">20 PLN</div>
                    <div class="item-description">Sałatka z pomidorów, mozzarelli, bazylii i oliwy z oliwek.</div>
                </li>
                <li>
                    <img src="../img/tatar.jpg" alt="Przystawka 2">
                    <div class="item-name">Tatar z łososia</div>
                    <div class="item-price">25 PLN</div>
                    <div class="item-description">Tatar z surowego łososia, awokado, limonki i kolendry.</div>
                </li>
            </ul>
        </div>

        <div class="menu-category">
            <h2>Dania Główne</h2>
            <ul>
                <li>
                    <img src="../img/poledwiczki.jpg" alt="Danie główne 1">
                    <div class="item-name">Polędwiczki wieprzowe</div>
                    <div class="item-price">45 PLN</div>
                    <div class="item-description">Polędwiczki wieprzowe w sosie grzybowym z ziemniakami puree.</div>
                </li>
                <li>
                    <img src="../img/losos.jpg" alt="Danie główne 2">
                    <div class="item-name">Łosoś w sosie teriyaki</div>
                    <div class="item-price">50 PLN</div>
                    <div class="item-description">Grillowana ryba w sosie teriyaki, podana z ryżem jaśminowym.</div>
                </li>
            </ul>
        </div>
        
        <div class="menu-category">
            <h2>Desery</h2>
            <ul>
                <li>
                    <img src="../img/tiramisu.jpg" alt="Deser 1">
                    <div class="item-name">Tiramisu</div>
                    <div class="item-price">18 PLN</div>
                    <div class="item-description">Włoski deser na bazie mascarpone, kawy i kakao.</div>
                </li>
                <li>
                    <img src="../img/sernik.jpg" alt="Deser 2">
                    <div class="item-name">Sernik na zimno</div>
                    <div class="item-price">15 PLN</div>
                    <div class="item-description">Sernik na zimno z owocami leśnymi.</div>
                </li>
            </ul>
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

    <script src="../script.js"></script>
</body>
</html>
