<?php
 session_start();
 if((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']!=true))
	{
		header('Location: index.php');
		exit();
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
    <title>Menu Kas Fiskalnych</title>
</head>
<body>
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
        <div>
            <input type="checkbox" id="menu-checkbox">
            <label for="menu-checkbox" id="menu-checkbox2">
                <i class="fas fa-bars"></i>
            </label> 
            <div class='sidebar sidebar-position'>
                <div class='sidebar-header'>Menu</div>
                <ul class='sidebar-content-underline'>
                    <li><a href='logout5.php'><i class="fas fa-cash-register"></i>Przeglądy</a></li>
                    <li><a href='logout1.php'><i class="fas fa-list"></i>Lista kas fiskalnych</a></li>
                    <li><a href='logout2.php'><i class="fas fa-plus"></i>Dodaj kasę fisklaną</a></li>
                    <li><a href='logout3.php'><i class="far fa-calendar-plus"></i></i>Dodaj przegląd</a></li>
                    <li><a href='logout4.php'><i class="fas fa-id-card"></i>Klienci</a></li>
                    <li><a href='logout6.php'><i class="far fa-envelope"></i>Wyślij maila do klienta</a></li>
                    <?php 
                    if($_SESSION['admin'] == 1){
                        echo "<li><a href='uzytkownicy.php'><i class='fas fa-address-book'></i>Użytkownicy</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
