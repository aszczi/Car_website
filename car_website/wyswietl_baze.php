<?php

//filtrowanie i sortowanie
$filterLocation = isset($_GET['lokalizacja']) ? $_GET['lokalizacja'] : '';
$sortOrder = isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'DESC' : 'ASC';
$nextSortOrder = $sortOrder == 'ASC' ? 'desc' : 'asc';

$sql = "SELECT * FROM cars WHERE lokalizacja LIKE '%$filterLocation%' ORDER BY cena $sortOrder";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Samochody</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.html">Strona główna</a>
        <div class="dropdown">
          <button class="dropbtn">Nowinki motoryzacyjne
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="wybor_pierwszego_auta.html">Wybór pierwszego auta</a>
            <a href="dbanie_o_auto_w_zimie.html">Dbanie o auto w zimie</a>
            <a href="luksusowe_samochody.html">Luksusowe samochody</a>
          </div>
        </div>
        <a href="nasza_baza_samochodow.html">Nasza baza samochodów</a>
        <a href="kontakt.html">Kontakt</a>
      </div>
    <div class="container">
    <h1>Samochody</h1>
    <a href="nasza_baza_samochodow.php" style="display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">Dodaj samochód</a>
    <form method="GET">
        <input type="text" name="lokalizacja" placeholder="Filtruj po lokalizacji..." value="<?php echo $filterLocation; ?>" />
        <button type="submit">Filtruj</button>
    </form>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Rok</th>
                <th>Przebieg</th>
                <th>Pojemność</th>
                <th>Wypadkowy</th>
                <th>Lokalizacja</th>
                <th>Kraj pochodzenia</th>
                <th>Pierwszy właściciel</th>
                <th><a href="?lokalizacja=<?php echo $filterLocation; ?>&sort=<?php echo $nextSortOrder; ?>">Cena</a></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['marka']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['rok']; ?></td>
                        <td><?php echo $row['przebieg']; ?></td>
                        <td><?php echo $row['pojemnosc']; ?> L</td>
                        <td><?php echo $row['wypadkowy'] ? 'TAK' : 'NIE'; ?></td>
                        <td><?php echo $row['lokalizacja']; ?></td>
                        <td><?php echo $row['kraj pochodzenia']; ?></td>
                        <td><?php echo $row['pierwszy wlasciciel'] ? 'TAK' : 'NIE'; ?></td>
                        <td><?php echo number_format($row['cena'], 2, ',', ' ') . ' PLN'; ?></td>
                    </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td colspan="11">Brak wyników</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();


?>