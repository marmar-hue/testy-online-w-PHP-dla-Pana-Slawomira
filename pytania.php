<?php
$conn = new mysqli("localhost", "root", "", "testonline");
//Check connection
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

// Losowanie pytań
$zapytania = array();
$odpowiedzi = array();
//Losowanie pytan
for ($i = 1; $i <= 11; $i++) {
  if (count($zapytania) >= 10) {
    break;  
  }
    $random_id = rand(1, 10); 
    $zapytanie = "SELECT pytanie FROM pytania ORDER BY RAND() * waga DESC LIMIT 10";
    $zapytanie2 = "SELECT odpowiedz FROM `pytania` WHERE id_pytania = $random_id";
    $result2 = $conn->query($zapytanie2);
    $result = $conn->query($zapytanie);

    if ($result && $result->num_rows > 0) {
   
        $pytanie = $result->fetch_assoc();
        $zapytania[] = $pytanie['pytanie'];
 
      } 
    if ($result2 && $result2->num_rows > 0) {
   
        $odpowiedz = $result2->fetch_assoc();
        $odpowiedzi[] = $odpowiedz['odpowiedz'];
 
      } 
}

?>