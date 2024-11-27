<?php
$conn = new mysqli("localhost", "root", "", "testonline");

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$dobre_odp = 0;

if (isset($_POST['odp'])) {
    $odpowiedzi_uzytkownika = $_POST['odp'];

    foreach ($odpowiedzi_uzytkownika as $id_pytania => $odp_uzytkownika) {
        $zapytanie = "SELECT odpowiedz FROM `pytania` WHERE id_pytania = $id_pytania";
        $result = $conn->query($zapytanie);

        if ($result && $result->num_rows > 0) {
            $b = $result->fetch_assoc();
            $poprawna_odp = strtoupper(($b['odpowiedz'])); // strtolower bo tak latwiej sprawdzisz czy jest na 100% dobra 
            $odp_uzytkownika2 = strtoupper(($odp_uzytkownika));

            if ($odp_uzytkownika2 === $poprawna_odp) {
                $dobre_odp++;
            }
             
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik Quizu</title>
    <style>
        /* Ogólne style dla strony */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f4f6;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    box-sizing: border-box;
}

/* Karta wyniku */
.container {
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 90%;
    max-width: 400px;
}

/* Nagłówek */
h1 {
    color: #2c3e50;
    font-size: 2.2rem;
    margin-bottom: 15px;
}

/* Wynik */
p {
    font-size: 1.5rem;
    color: #3498db;
    font-weight: bold;
}

/* Styl liczbowy */
p span {
    font-size: 2rem;
    color: #27ae60;
}

/* Efekt hover dla całego wyniku */
.container:hover {
    transform: scale(1.02);
    transition: transform 0.3s ease-in-out;
}

/* Responsywność */
@media (max-width: 500px) {
    h1 {
        font-size: 1.8rem;
    }

    p {
        font-size: 1.2rem;
    }
}

    </style>
</head>
<body>
    <h1>Twój wynik</h1>
    <p><?= $dobre_odp ?>/<?= 10 ?></p>
</body>
</html>
