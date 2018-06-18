<?php
session_start();
include_once ('OfertyFunc.php');
include_once ('bazadanych.php');

$oferta = new Oferty();
$oferty = $oferta->fetch_all();

if( isset($_SESSION['email']) ){

	$dane = $polaczenie->prepare('SELECT id,email,haslo FROM uzytkownicy WHERE emailKlienta = :emailKlienta');
	$dane->bindParam(':emailKlienta', $_SESSION['email']);
	$dane->execute();
	
}

?>


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
				
			</div>
			
			<h1> HOTEL AMIGOS</h1>
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
		<h2>HOTEL</h2>
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Pokaża wszystko</button>
  <button class="btn" onclick="filterSelection('nature')"> 2 osobowy</button>
  <button class="btn" onclick="filterSelection('cars')"> 3 osobowy</button>
  <button class="btn" onclick="filterSelection('people')"> 4 osobowy</button>
</div>
                
<?php foreach ($oferty as $oferta) { ?>
                <?php $rezerwacja[] = $oferta['id_pokoju']; ?>

<?php } ?>
<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column nature">
    <div class="content">
      <img src="zdjecia/1.jpg" alt="Mountains" style="width:100%">
      <h4>Mountains</h4>
      <a href="rezerwacja.php?id=<?php echo $rezerwacja[0];?>">
          Rezerwacja
          </a>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
      <img src="zdjecia/2.jpg" alt="Lights" style="width:100%">
      <h4>Lights</h4>
      <a href="rezerwacja.php?id=<?php echo $rezerwacja[1];?>">
          Rezerwacja
          </a>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>

  <div class="column cars">
    <div class="content">
      <img src="zdjecia/2.jpg" alt="Car" style="width:100%">
      <h4>Retro</h4>
      <a href="rezerwacja.php?id=<?php echo $rezerwacja[2];?>">
          Rezerwacja
          </a>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>


  <div class="column people">
    <div class="content">
      <img src="zdjecia/3.jpg" alt="People" style="width:100%">
      <h4>Girl</h4>
      <a href="rezerwacja.php?id=<?php echo $rezerwacja[3];?>">
          Rezerwacja
          </a>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>


<!-- END GRID -->
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
<script src="js/oferty.js"></script>
</body>
</html>

