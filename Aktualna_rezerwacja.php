
<?php

session_start();

include_once ('OfertyFunc.php');
require 'bazadanych.php';
$oferta = new Oferty();

$test = $_SESSION['email'];
if( isset($_SESSION['email']) ){

	$dane = $polaczenie->prepare('SELECT id_klienta,emailKlienta FROM klient WHERE emailKlienta = :emailKlienta');
	$dane->bindParam(':emailKlienta', $_SESSION['email']);
	$dane->execute();
	
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script type="text/javascript">
        function Show() {
            document.getElementById("rezerwacja").style.display = "block";
            document.getElementById("logmenu").style.display = "none";
            document.getElementById("unlogmenu").style.display = "block";
        }
        function Hide() {
            document.getElementById("rezerwacja").style.display = "none";
            document.getElementById("unlogmenu").style.display = "none";
            document.getElementById("logmenu").style.display = "block";
        }
        </script>
	<title>Amigos</title>
	
	<meta name="description" content="Hotel Amigos" />
	<meta name="keywords" content="hotel, amigos, anonimowo, rezerwacja, pokoje" />
	
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	
</head>

<body>

	<div id="container">
		<header>
			<div id="photo_topbar">
				<img src="img/logo.png" style='height: 100%; width: 100%; object-fit: contain'/> 
			</div>
			
			
		</header>
		<nav>
			<ul class="main_menu">
                            <?php if( isset($_SESSION['email']) ){ 
                                echo '<div id="login">Jesteś zalogowany</div>';
                                
                                echo '<script type="text/javascript">
                                window.onload = Show;
                                </script>';
                                                        
                            }
                            else 
                            {
                              echo '<div id="login">Nie jestes zalogowany</div>';  
                               echo '<script type="text/javascript">
                                window.onload = Hide;
                                </script>';
                            }
                                ?>
                            <div id="log_wrap">
                            <div id="logmenu"><a href="logowanie.php" style="text-decoration: none">Zaloguj</a></div>
                            <div id="unlogmenu"><a href="wylogowanie.php" style="text-decoration: none">Wyloguj</a></div>
                            </div>
			</ul>
		</nav>
		<div style="clear: both;"></div>
		
		<div id="navigation">
			<ul class="side_menu">
                            <li>
                            <a href="index.php" style="text-decoration: none;">start</a>
                            </li>

                                <li>
				<a href="oferty.php" style="text-decoration: none;">oferta</a>
                                </li>

                                <li>
				<a href="galeria.html" style="text-decoration: none;">galeria</a>
                               
                                </li>
				
                                
				<div id="rezerwacja">
                                     <li>
                                         
				<a href="rezerwacja" style="text-decoration: none; line-height: 20px;" >Aktualna rezerwacja</a>
                                     </li>
				</div>
                              
			</ul>
		</div>
		
		
		<section>
                    <?php
        $data3 = $oferta->fetch_kod($test); 
        $rezerwacja = $data3['id_klienta'];
                    
        $data = $oferta->fetch_rezerwacja($rezerwacja); 
        echo '<div id="info">';
        echo 'liczbaOsob: ';
        echo $data['liczbaOsob'];
        echo '<br>';
        echo 'dzienPrzyjazdu: ';
        echo $data['dzienPrzyjazdu'];
        echo '<br>';
        echo 'dzienOdjazdu: ';
        echo $data['dzienOdjazdu'];
        echo '<br>';
        echo 'uslugiDodatkowe: ';
        echo $data['uslugiDodatkowe'];
        echo '<br>';
        echo 'Numer Pokoju: ';
        echo $data['_id_pokoju'];
        echo '<br>';
       /* echo '<a href="index.php" style="color: black;">start</a>';*/
        echo '</div>';
        ?>
                        <div id ="edycja">
                        <a href="edycja_rezerwacji.php" style="color: black;">Edytuj</a>
                        </div>
			</section>
		
		<aside>
			<img src="photo/side_bar_1.jpg"></img>
		</aside>
		
		<footer>
			<ul id="botbar">
				<li>2018 &copy; Hotel Amigos	||	</li>
				<li>Contact: <a href="mailto:hotel.info.amigos@gmail.com" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;"><i class="icon-mail-alt"></i></a> hotel.info.amigos@gmail.com </li>
				
			</ul>
		</footer>
	</div>

</body>
</html>

