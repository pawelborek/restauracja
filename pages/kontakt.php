<?php
$serwer = "localhost";
$uzytkownik = "root";
$haslo = "";
$baza = "bigfoodforyou";


$conn = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);


if (!$conn) {
    die("Połączenie nie powiodło się: " . mysqli_connect_error());
}

if (isset($_POST['wyslij'])) {
    $imie = htmlspecialchars(trim($_POST['imie']));
    $nazwisko = htmlspecialchars(trim($_POST['nazwisko']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefon = htmlspecialchars(trim($_POST['tel']));
    $wiadomosc = htmlspecialchars(trim($_POST['wiadomosc']));
    $prywatnosc = isset($_POST['prywatnosc']) ? 1 : 0;  

    if (empty($imie) || empty($nazwisko) || empty($email) || empty($wiadomosc) || !$prywatnosc) {
        echo "Wszystkie pola są wymagane, a zgoda na przetwarzanie danych musi być zaznaczona!";
    } else {
        $query = "INSERT INTO formularz_kontaktowy (imie, nazwisko, email, telefon, wiadomosc, prywatnosc) 
                  VALUES ('$imie', '$nazwisko', '$email', '$telefon', '$wiadomosc', '$prywatnosc')";

        if (mysqli_query($conn, $query)) {
            echo "Dziękujemy za wiadomość! Skontaktujemy się z Tobą wkrótce.";
        } else {
            echo "Wystąpił błąd podczas wysyłania formularza: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
</head>
<body>
    <a href="../index.php">Powrót na stronę głowną</a>
</body>
</html>
