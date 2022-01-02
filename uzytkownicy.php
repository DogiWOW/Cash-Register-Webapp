<?php
    session_start();
	if($_SESSION['admin']!=1)
	{
		header('Location: index.php');
		exit();
	}
    
    $host = "localhost"; //adres hosta
	$name = "root";	//nazwa użytkownika
	$pass = "";	//hasło, jeśli nie ma zostawić puste
	$dbname = "projekt"; //nazwa bazy danych
	$conn = mysqli_connect($host, $name, $pass, $dbname); //połączenie z bazą danych

    $conn = mysqli_connect($host, $name, $pass, $dbname);
    if(mysqli_connect_errno()) echo "Problemy techniczne, proszę spróbować później.";
    else
    {
        $kwerenda = "SELECT * FROM uzytkownicy";
        if($wynik=mysqli_query($conn, $kwerenda))
        {
            while($row=mysqli_fetch_array($wynik))
            {
                echo '<b>Imie: </b>'.$row[1]." <b>Nazwisko: </b>".$row[2]." <b>Email: </b>".$row[3].' <a href="usuwanie_uzyt.php">USUŃ</a>'."<br />";
            }
            echo '<br /><a href="dodaj_uzyt.php">DODAJ UŻYTKOWNIKA</a>';
        }
        mysqli_close($conn);
    }
?>