<?php
$conn = new mysqli("localhost", "root", "", "testonline");

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$dobre_odp = 0;
$zle_odp = 0;
if (isset($_POST['odp'])) {
    $odpowiedzi_uzytkownika = $_POST['odp'];
    $username = $_POST['username'];

    foreach ($odpowiedzi_uzytkownika as $id_pytania => $odp_uzytkownika) {
        $zapytanie = "SELECT odpowiedz FROM `pytania` WHERE id_pytania = $id_pytania";
        $result = $conn->query($zapytanie);
        if ($result && $result->num_rows > 0) {
            $b = $result->fetch_assoc();
            $poprawna_odp = strtolower(($b['odpowiedz'])); // strtolower bo tak latwiej sprawdzisz czy jest na 100% dobra 
            $odp_uzytkownika = strtolower(($odp_uzytkownika)); 
            if ($odp_uzytkownika === $poprawna_odp) {
                $dobra_odp = "INSERT INTO wyniki (id_pytania, id_uzytkownika, czy_poprawne) VALUES ($id_pytania, $username, 1)";
                $conn->query($dobra_odp);
            }else{
                $zla_odp = "INSERT INTO wyniki (id_pytania, id_uzytkownika, czy_poprawne) VALUES ($id_pytania, $username, 0)";
                $conn->query($zla_odp);
            }
        
        }
    }
}
$sql = "INSERT INTO uzytkownicy (nazwa, dobre_odp) VALUES ('$username', '$dobre_odp')";
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
