<?php
 session_start();
 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kas Fiskalnych</title>
</head>
<body>
    <h1>System Zarządzania Kasami Fiskalnymi</h1>
	<?php 
		echo "Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko']."<br />";

	?>
    <a href='logout.php'>Wyloguj</a><br>
    <a href='logout.php'>Lista kas fiskalnych</a><br>
    <a href='logout.php'>Dodaj kasę fisklaną</a><br>
    <a href='logout.php'>Klienci</a><br>
    <?php
    if($_SESSION['admin'] == 1){
        echo "<a href='logout.php'>Użytkownicy (administrator)</a><br>";
    }
    ?>
    <a href='logout.php'>Przeglądy</a><br>
    <a href='logout.php'>Dodaj przegląd</a><br>
    <a href='logout.php'>Wyślij maila do klienta</a><br>
</body>
</html>