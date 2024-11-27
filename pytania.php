<?php
$conn = new mysqli("localhost", "root", "", "testonline");

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}
$zapytania = array(); 
$odpowiedzi = array();

// Pytania
while (count($zapytania) < 10) {
    $random_id = rand(1, 15); 
    $zapytanie = "SELECT pytanie FROM `pytania` WHERE id_pytania = $random_id";
    $result = $conn->query($zapytanie);

    if ($result && $result->num_rows > 0) {
        $pytanie = $result->fetch_assoc();
        
        // Dodawanie pytania do tablicy, jeśli nie zostało jeszcze dodane
        if (!in_array($pytanie['pytanie'], $zapytania)) {
            $zapytania[] = $pytanie['pytanie'];
        }
    }
}

// Odp
foreach (array_keys($zapytania) as $id_pytania) {
    $zapytanie2 = "SELECT odpowiedz FROM `pytania` WHERE id_pytania = $id_pytania";
    $odp_result = $conn->query($zapytanie2);

    if ($odp_result && $odp_result->num_rows > 0) {
        $odp_data = $odp_result->fetch_assoc();
        $odpowiedzi[$id_pytania] = $odp_data['odpowiedz']; 
    }
}
?>