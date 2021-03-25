<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}
$login = $_POST['login'];
$haslo = $_POST['haslo'];

require_once "connect.php";
$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name) or die ("Błąd");  
$wynik = $polaczenie->query("SELECT login,password FROM users");

if($login == $login && $haslo == $login)
{

$_SESSION['zalogowany'] = true;
unset($_SESSION['blad']);
header('Location: odczytlocal.php');
}
else 
$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
header('Location: index.php');
?>