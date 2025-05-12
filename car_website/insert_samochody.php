<?php
include_once 'baza_danych.php';

if(isset($_POST['submit'])) {    
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rok = $_POST['rok'];
    $przebieg = $_POST['przebieg'];
    $pojemnosc = $_POST['pojemnosc'];
    $wypadkowy = ($_POST["wypadkowy"] == "TAK") ? 1 : 0; // Convert to 1 if TAK, 0 if NIE
    $kraj_pochodzenia = $_POST["kraj_pochodzenia"];
    $pierwszy_wlasciciel = ($_POST["pierwszy_wlasciciel"] == "TAK") ? 1 : 0; // Convert to 1 if TAK, 0 if NIE


    $sql = "INSERT INTO samochody (`marka`, `model`, `rok`, `przebieg`, `pojemnosc`, `wypadkowy`, `kraj pochodzenia`, `pierwszy wlasciciel`)
            VALUES ('$marka', '$model', '$rok', '$przebieg', '$pojemnosc', '$wypadkowy', '$kraj_pochodzenia', '$pierwszy_wlasciciel')";

    if (mysqli_query($conn, $sql)) {
       // echo "Nowy rekord zostal dodany pomyslnie!";

$sql = "SELECT * FROM samochody";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Rok</th>
                <th>Przebieg</th>
                <th>Pojemność</th>
                <th>Wypadkowy</th>
                <th>Kraj pochodzenia</th>
                <th>Pierwszy właściciel</th>
            </tr>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['marka']}</td>
                <td>{$row['model']}</td>
                <td>{$row['rok']}</td>
                <td>{$row['przebieg']}</td>
                <td>{$row['pojemnosc']}</td>
                <td>" . ($row['wypadkowy'] == 1 ? "TAK" : "NIE") . "</td>
                <td>{$row['kraj pochodzenia']}</td>
                <td>" . ($row['pierwszy wlasciciel'] == 1 ? "TAK" : "NIE") . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
//-------------------------------------
    } else {
        echo "Blad: " . $sql . ":-" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
		