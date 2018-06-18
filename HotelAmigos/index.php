
<?php

session_start();

require 'bazadanych.php';

if( isset($_SESSION['email']) ){

	$dane = $polaczenie->prepare('SELECT id,email,haslo FROM uzytkownicy WHERE emailKlienta = :emailKlienta');
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
                                         
                                         <a href="Aktualna_rezerwacja.php" style="text-decoration: none; line-height: 20px;" >Aktualna rezerwacja</a>
                                     </li>
				</div>
                              
			</ul>
		</div>
		
		
		<section>
			<h1>Hotel Amigos</h1>
			<p>Hotel Amigos jest jedynym na świecie hotelem zapewniającym pełną anonimowość swoim klientom. Tak wysoki poziom anonimowości był nieosiągalny dla hoteli aż do teraz. Szeroki przekrój oferty, bogate wyposarzenie i wyśmienita obsługa sprawi, że na długo zapamiętasz pobyt u nas.</p>
			
			<p>Hotel wspiera rezerwację online, telefoniczną lub na miejscu w hotelu.</p>
			
			<h2> Nie zwlekaj. Sprawdź! </h2>
                        <div id="hotel">
                            <img src="img/hotel.jpg" height="100%" width="100%" >
                        </div>
			<div id="tel">
				<p>Nr tel. do rezerwacji:
				<br> +48 768-993-221
			</div>
			<div id="adres">
				<br>Adres hotelu:
				<br> ul. Królewska 1 
				<br> 45-678, Opole
			</div>
			<div style="clear:both;"></div>
			<p/>
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

