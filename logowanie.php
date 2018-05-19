<?php

session_start();

if( isset($_SESSION['uzytkownik_id']) ){
	header("Location: http://localhost/Systemlogowaniarejestracji/index.php");
}

require 'bazadanych.php';

if(!empty($_POST['email'])):
	
	$dane = $polaczenie->prepare('SELECT id,email,kod FROM uzytkownicy WHERE email = :email');
	$dane->bindParam(':email', $_POST['email']);
	$dane->execute();
	$wynik = $dane->fetch(PDO::FETCH_ASSOC);

	$wiadomosc = '';

	if(count($wynik) > 0 && password_verify($_POST['haslo'], $wynik['kod']) ){

		$_SESSION['uzytkownik_id'] = $wynik['id'];
		header("Location: http://localhost/Systemlogowaniarejestracji/index.php");

	} else {
		$wiadomosc = 'Dane sie nie zgadzaja';
	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Logowanie</title>
	
</head>
<body>

	<div class="header">
		<a href="/">Hotel</a>
	</div>

	<?php if(!empty($wiadomosc)): ?>
		<p><?= $wiadomosc ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	<span>or <a href="register.php">Rejestracja</a></span>

	<form action="logowanie.php" method="POST">
		
		<input type="text" placeholder="Wprowadz email" name="email">
		<input type="password" placeholder="oraz kod" name="kod">

		<input type="submit">

	</form>

</body>
</html>