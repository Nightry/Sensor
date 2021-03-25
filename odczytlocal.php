<!DOCTYPE HTML>
<html lang="pl">
<head>
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Odczyt danych</title>
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	else
echo "<div class='topnav'>";
	echo '<p><a href="logout.php">Wyloguj</a></p>';
	echo '<p><a href="odczytlocal.php">Stan Aktualny</a></p>';
	echo '<p><a href="historytemp.php">Temperatura</a></p>';
	echo '<p><a href="historysun.php">Nasłonecznienie</a></p>';
echo "</div>";
require_once "connect.php";
echo "<div class='container'>";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name) or die ("Błąd");  
$wynik = $polaczenie->query("SELECT Lp,Data, Temperatura, Nasłonecznienie, TempZadana, Stan FROM dane ORDER BY Lp DESC");
 
	if($wynik->num_rows > 0) 
	{
		
		echo "<p class='paragraph'> Aktualny stan </p>	";
		echo "<table id='tabela'>";
		echo "<tr>";
		echo "<th>Czas</th>";
		echo "<th>Temperatura</th>";
		echo "<th>Nasłonecznienie</th>";
		echo "<th>TempZadana</th>";
		echo "<th>Stan</th>";
		echo "</tr>";
		
		$wiersz=$wynik->fetch_object();
		$data=date("Y-m-d H:i:s", $wiersz->Data);
		echo "<tr>";
		echo "<td>".$data."</td>";
		echo "<td>".$wiersz->Temperatura."</td>";
		echo "<td>".$wiersz->Nasłonecznienie."</td>";
		echo "<td>".$wiersz->TempZadana."</td>";
		echo "<td>".$wiersz->Stan."</td>";
		echo "</tr>";
		
		/*while($wiersz = $wynik->fetch_object())
		{
		echo "<tr>";
		echo "<td>".$wiersz->Lp."</td>";
		echo "<td>".$wiersz->Temperatura."</td>";
		echo "<td>".$wiersz->Nasłonecznienie."</td>";
		echo "<td>".$wiersz->TempZadana."</td>";
		echo "<td>".$wiersz->Stan."</td>";
		echo "</tr>";
		}*/
		echo "</table>";
		
	}
		else
		{
			echo "Baza pusta";
		}
		
$polaczenie->close();
echo "</div>";
?>

</body>
</html>