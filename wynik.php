<?php
$conn = new mysqli("localhost", "root", "", "testonline");

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$dobre_odp = 0;

if (isset($_POST['odp'])) {
    $odpowiedzi_uzytkownika = $_POST['odp'];
    $nazwa_uzytkownika = $_POST['user'];

    foreach ($odpowiedzi_uzytkownika as $id_pytania => $odp_uzytkownika) {
        $zapytanie = "SELECT odpowiedz FROM `pytania` WHERE id_pytania = $id_pytania";
        $result = $conn->query($zapytanie);
        echo $odp_uzytkownika;
        if ($result && $result->num_rows > 0) {
            $b = $result->fetch_assoc();
            $poprawna_odp = strtolower(($b['odpowiedz'])); // strtolower bo tak latwiej sprawdzisz czy jest na 100% dobra 
            $odp_uzytkownika2 = strtolower(($odp_uzytkownika));

            if ($odp_uzytkownika2 === $poprawna_odp) {
                $dobre_odp++;
            }
             
        }
    }
}
    $sql = "INSERT INTO wyniki (user, wynik) VALUES ('$nazwa_uzytkownika', '$dobre_odp')";
    $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik Quizu</title>
</head>
<body>
    <h1>Twój wynik</h1>
    <p><?= $dobre_odp ?>/<?= 10 ?></p>
</body>
</html>
