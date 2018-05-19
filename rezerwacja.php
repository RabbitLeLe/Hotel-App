<?php

session_start();

if( isset($_SESSION['uzytkownik_id']) ){
	header("Location: http://localhost/Systemlogowaniarejestracji/index.php");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require 'bazadanych.php';

$wiadomosc = '';

if(!empty($_POST['email'])):
	
	
	$sql = "INSERT INTO uzytkownicy (email, haslo) VALUES (:email, :haslo)";
	$stmt = $polaczenie>prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	
        

	if( $stmt->execute() ):
		$wiadomosc = 'Poprawnie dodano nowego uzytkownika';
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->isHTML();
                $mail->Username = '$stmt';
                $mail->Password = '3215644a5s454d65sa6a4a9';
                $mail->SetFrom('Amigosfirmail@gmail.com');
                $mail->Subject = 'Kod zamowienia';
                $mail->Body = 'randomkey';
                $mail->AddAddress('Amigosfirmail@gmail.com');
                
                $mail->Send();
                        
	else:
		$wiadomosc = 'Wystapil blad podczas tworzenie uzytkownika';
	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Rejestracja</title>
	
</head>
<body>

	<div class="header">
		<a href="/">Hotel</a>
	</div>

	<?php if(!empty($wiadomosc)): ?>
		<p><?= $wiadomosc ?></p>
	<?php endif; ?>

	<h1>Rezerwacja</h1>
	<span>lub <a href="logowanie.php">logowanie</a></span>

	<form action="rezerwacja.php" method="POST">
		
		<input type="text" placeholder="Wprowadz email" name="email">
		<input type="submit">

	</form>

</body>
</html>