<?php
$server = 'localhost';
$nazwauzytkownika = 'root';
$haslo = '';
$bazadanych = 'Autoryzacja';

try{
	$polaczenie = new PDO("mysql:host=$server;dbname=$bazadanych;", $nazwauzytkownika, $haslo);
} catch(PDOException $e){
	die( "Polaczenie nieudane: " . $e->getMessage());
}