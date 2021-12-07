<?php
	//error_reporting(E_ERROR | E_PARSE); //wyłączenie pokazywanie błędów
	
	session_start();
	
	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: logowanie.php');
		exit();
	}
	
	$host = "localhost"; //adres hosta
	$name = "root";	//nazwa użytkownika
	$pass = "";	//hasło, jeśli nie ma zostawić puste
	$dbname = "projekt"; //nazwa bazy danych
	$conn = mysqli_connect($host, $name, $pass, $dbname); //połączenie z bazą danych
	
	if(mysqli_connect_errno()) echo "Problemy techniczne, proszę spróbować później."; //wypisz jeśli nie udało się połączyć z bd
	else //jeśli się uda połączyć
	{
		$login = $_POST['login']; //pobieranie loginu z formularza
		$haslo = $_POST['haslo']; //pobieranie hasła z formularza
		
		$kwerenda = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'"; //dobierania użytkownika według hasła i loginu za pomocą kwerendy SQL
		
		if($wynik=mysqli_query($conn, $kwerenda)) //pobieranie danych według kwerendy $conn
		{
			$ilosc = mysqli_num_rows($wynik); //ilość wierszy pobranych według tej kwerendy
			if($ilosc==1) //jeżeli pobrało jeden wiersz wykonaj
			{
				$row = mysqli_fetch_array($wynik); //wkładanie do zmiennej row wiersz z danymi użytkownika
				
				$_SESSION['zalogowany']=true; 
				
				$_SESSION['imie']=$row['imie']; //pobieranie do sesji danych z bd którę chcemy przechować
				
				unset($_SESSION['blad']); //wyłączanie sesji blad jeśli udało nam się zalogować
				header('Location: strona.php'); //strona dla zalogowanego użytkownika
				
				mysqli_free_result($wynik);
			}
			else //jeśli pobrało więcej niż jeden wiersz wykonaj
			{
				$_SESSION['blad'] = "Błąd logowania! Hasło lub login są nieprawidłowe.";
				header('Location: logowanie.php');
			}
		}
		
		mysqli_close($conn); //zakończenie pracy z bd
	}
?>
