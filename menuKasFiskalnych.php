<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style-menu.css">
    <title>Menu Kas Fiskalnych</title>
</head>
<body>
    <div id='main'>
        <div id="heading_user">
            <div id="heading">
                <h1>System Zarządzania Kasami Fiskalnymi</h1>
            </div>
            <div id='logged_user'>
                Zalogowano jako: <?php echo $_SESSION['imie']; ?>
                <a href='logout.php'>Wyloguj</a>
            </div>
        </div>
        <div class='anchor_buttons'>
            <button><a href='logout.php'>Lista kas fiskalnych</a></button>
            <button><a href='logout.php'>Dodaj kasę fisklaną</a></button>
            <button><a href='logout.php'>Klienci</a></button>
            <button><a href='logout.php'>Przeglądy</a></button>
            <button><a href='logout.php'>Dodaj przegląd</a></button>
            <button><a href='logout.php'>Wyślij maila do klienta</a></button>
            <?php 
            if($_SESSION['admin'] == 1){
                echo "<button><a href='logout.php'>Użytkownicy (administrator)</a></button>";
            }
            ?>
        </div>
    </div>
</body>
</html>