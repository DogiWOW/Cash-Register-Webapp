<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE); //wyłączenie pokazywanie błędów
	if((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']!=true))
	{
		header('Location: index.php');
		exit();
	}

	echo '<form method="POST">';
	echo '<b>KASA FISKALNA</b><br />';
	echo 'Model: <input type="text" name="model" />';
	echo 'Numer unikatowy: <input type="text" name="nr_unikatowy" />';
	echo '<input type="submit" value="Dodaj"/>';
	echo '</form>';

	$model=htmlentities($_POST['model'],ENT_QUOTES,"UTF-8");
	$nr_unikatowy=htmlentities($_POST['nr_unikatowy'],ENT_QUOTES,"UTF-8");
	
	if(!empty($model)&&!empty($nr_unikatowy)) //jeżeli te dwie zmienne nie są puste wykonaj
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
			$kwerenda="INSERT INTO kasy(data_fisk, nr_unikatowy, model) VALUES('$aktualna_data', '$nr_unikatowy', '$model')";
			if(mysqli_query($conn, $kwerenda))
			{
				echo "Zapisano";
			}
			else "Nie zapisano";
		}
		mysqli_close($conn);
	}
?>
