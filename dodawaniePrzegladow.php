<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE); //wyłączenie pokazywanie błędów
	if((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']!=true))
	{
		header('Location: index.php');
		exit();
	}

	echo '<form method="POST">';
	echo '<b>PRZEGLĄD</b><br />';
	echo 'Numer kasy: <input type="text" name="nr_kasy" />';
	echo '<input type="submit" value="Dodaj"/>';
	echo '</form>';

	$nr_kasy=htmlentities($_POST['nr_kasy'], ENT_QUOTES, "UTF-8");

	if(!empty($nr_kasy)) //jeśli nie jest puste zrób
	{
		$host = "localhost"; //adres hosta
		$name = "root";	//nazwa użytkownika
		$pass = "";	//hasło, jeśli nie ma zostawić puste
		$dbname = "projekt"; //nazwa bazy danych
		$conn = mysqli_connect($host, $name, $pass, $dbname); //połączenie z bazą danych

		if(mysqli_connect_errno()) echo "Problemy techniczne, proszę spróbować później.";
		else
		{
			$aktualna_data=date('Y-m-d'); //pobieranie aktualnej daty
			$kwerenda="UPDATE przeglady SET data='$aktualna_data' WHERE nr_kasy='$nr_kasy'";
			if(mysqli_query($conn, $kwerenda))
			{
				echo "Zapisano";
			}
			else "Nie zapisano";
		}
		mysqli_close($conn);
	}
?>
