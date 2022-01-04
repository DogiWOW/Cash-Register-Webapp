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

    function formularz_dodawania()
    {
        echo '<div id="formularz_dodawania">';
        echo '<form action="dodaj_uzyt.php" method="POST" />';
        echo 'Imie: <input type="text" name="imie" />';
        if(isset($_SESSION['bladi']));
        echo 'Nazwisko: <input type="text" name="nazwisko" />';
        if(isset($_SESSION['bladn']));
        echo 'Login: <input type="text" name="login" />';
        if(isset($_SESSION['bladl']));
        else unset($_SESSION['bladl']);
        echo 'Hasło: <input type="text" name="haslo" />';
        if(isset($_SESSION['bladh']));
        echo 'Email: <input type="text" name="email" />';
        if(isset($_SESSION['blade']));
        echo '<input type="submit" value="Zapisz" />';
        echo '</form>';
        if(isset($_SESSION['bladw'])) echo $_SESSION['bladw'];
        echo '</div>';
    }
    
    function usuwanie()
    {
        echo "Działa!";
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7af9736bb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style-menu.css">
    <link rel="stylesheet" href="CSS/style-dane.css">
    <title>Menu Kas Fiskalnych</title>
</head>
<body class="menu-preload">
    <div id='main'>
        <div id="heading-user">
            <div id="heading">
                <h1>System Zarządzania Kasami Fiskalnymi</h1>
            </div>
            <div id='logged-user'>
                Zalogowano jako: <?php echo $_SESSION['imie']; ?>
                <a href='logout.php'>Wyloguj</a>
            </div>
        </div>
        <div class='content'>
            <table class='dane_bazadanych'>
                <tr>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            <?php
                if(mysqli_connect_errno()) echo "Problemy techniczne, proszę spróbować później.";
                else{
                    $kwerenda = "SELECT * FROM uzytkownicy WHERE administrator!=1";
                    if($wynik=mysqli_query($conn, $kwerenda)){
                    while($row=mysqli_fetch_array($wynik)){
                        echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td><form method="POST"><input type="submit" value="USUŃ" name="usuwanie" /></form></td></tr>';
                    }
                    echo '<tr><td colspan="4"><form method="POST"><input type="submit" value="Dodaj użytkownika" name="dodajuzytkownika"></form></td></tr>';
                }
                mysqli_close($conn);
                }
            ?>
            </table>
        </div>
        <?php 
        $polecenie='';
        if(isset($_POST['dodajuzytkownika']))
        {
            $polecenie=$_POST['dodajuzytkownika'];
        }
        if(isset($_POST['usuwanie']))
        {
            $polecenie=$_POST['usuwanie'];
        }
        switch($polecenie)
        {
            case 'Dodaj użytkownika': formularz_dodawania(); break;
            case 'USUŃ':  {
                if(isset($_POST['dodajuzytkownika']))
                {
                    usuwanie();
                    formularz_dodawania();
                }
                
                break;}
        }
        ?>
        <div>
            <input type="checkbox" id="menu-checkbox" onClick="checkState()">
            <label for="menu-checkbox" id="menu-checkbox2">
                <i class="fas fa-bars"></i>
            </label>
            <!-- Javascript - menu.js -->
            <script src="JavaScript/menu.js"></script>
            <!-- Javascript - menu.js --> 
            <div class='sidebar sidebar-position'>
                <div class='sidebar-header'>Menu</div>
                <ul class='sidebar-content-underline'>
                    <li><a href='menuKasFiskalnych.php'><i class="fas fa-bookmark"></i>Menu Główne</a></li>
                    <li><a href='przeglady.php'><i class="fas fa-cash-register"></i>Przeglądy</a></li>
                    <li><a href='listaKasFiskalnych.php'><i class="fas fa-list"></i>Lista kas fiskalnych</a></li>
                    <li><a href='dodawanieKasFiskalnych.php'><i class="fas fa-plus"></i>Dodaj kasę fisklaną</a></li>
                    <li><a href='dodawaniePrzegladow.php'><i class="far fa-calendar-plus"></i></i>Dodaj przegląd</a></li>
                    <li><a href='klienci.php'><i class="fas fa-id-card"></i>Klienci</a></li>
                    <li><a href='wyslijMaila.php'><i class="far fa-envelope"></i>Wyślij maila do klienta</a></li>
                    <?php 
                    if($_SESSION['admin'] == 1)
                    {
                        echo "<li><a href='uzytkownicy.php'><i class='fas fa-address-book'></i>Użytkownicy</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
