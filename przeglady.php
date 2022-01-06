<?php
 session_start();
 error_reporting(E_ERROR | E_PARSE); //wyłączenie pokazywanie błędów
 if((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']!=true))
	{
		header('Location: index.php');
		exit();
	}
    
$host = "localhost"; //adres hosta
$name = "root";	//nazwa użytkownika
$pass = "";	//hasło, jeśli nie ma zostawić puste
$dbname = "projekt"; //nazwa bazy danych
$conn = mysqli_connect($host, $name, $pass, $dbname); //połączenie z bazą danych
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7af9736bb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style-menu.css">
    <link rel="stylesheet" href="CSS/style-strona.css">
    <title>Menu Kas Fiskalnych</title>
    <script src="Javascript/user-details.js" defer></script>
</head>
<body class="menu-preload">
    <div id='main'>
        <div id="heading-user">
            <div id="heading">
                <h1>System Zarządzania Kasami Fiskalnymi</h1>
            </div>
            <div id='logged-user'>
            <?php echo $_SESSION['imie'];?><span id="logged-user-icon"><i class="fas fa-user" onClick="managePopupWindow()"></i></span>
                
            </div>
        </div>
        <!-- Znikające okna początek -->
        <div id="user-details-window">
            <p>Zalogowano jako:</p> <?php echo "<p>".$_SESSION['imie']." ".$_SESSION['nazwisko']."</p><p>@".$_SESSION['login']."</p>"; ?>
            <a href='logout.php'>Wyloguj</a>
        </div>
        <div class='content'>
            <table class='dane_bazadanych'>
                <tr>
                    <th>Kasa</th>
                    <th>Klient</th>
                    <th>Telefon klienta</th>
                    <th>Email</th>
                    <th>
                        <form method="POST">Data <br /><select name="sortowanie">
                            <option value="default" name="default" selected>Domyślne</option>
                            <option value="rosnaco" name="rosnaco">Sortuj rosnąco</option>
                            <option value="malejaco" name="malejaco">Sortuj malejąco</option>
                        </select> <input type="submit" value="Wykonaj"></form>
                        </th>
                    <th></th>
                </tr>
            <?php
                $wybor=$_POST['sortowanie'];
                echo $wybor; //zmienna trzymająca wybór czy rosnąco czy malejąco
                if(mysqli_connect_errno()) echo "Problemy techniczne, proszę spróbować później.";
                else
                {
                    if((!isset($wybor))||($wybor=="default"))$kwerenda = "SELECT nr_kasy, nazwa, telefon, email, data FROM przeglady,klienci WHERE klienci.id=przeglady.klient"; //domyślne sortowanie

                    if($wybor=="malejaco")$kwerenda = "SELECT nr_kasy, nazwa, telefon, email, data FROM przeglady,klienci WHERE klienci.id=przeglady.klient ORDER BY data DESC"; //kwerenda do malejąco wg daty

                    if($wybor=='rosnaco')$kwerenda = "SELECT nr_kasy, nazwa, telefon, email, data FROM przeglady,klienci WHERE klienci.id=przeglady.klient ORDER BY data ASC"; //kwerenda do rosnąco wg daty

                    if($wynik=mysqli_query($conn, $kwerenda))
                    {
                        while($row=mysqli_fetch_array($wynik))
                        {
                            echo '<tr><td>'.$row['nr_kasy'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['telefon'].'</td><td>'.$row['email'].'</td><td>'.$row['data'].'</td></tr>';
                        }
                    }
                    mysqli_close($conn);
                }
            ?>
            </table>
        </div>
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
