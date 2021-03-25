<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Dodawanie do bazy</title>
</head>
<body>

<?php
//pobranie naszego ciagu znakow przychodzacego z programu napisanego w cpp
$data = file_get_contents('php://input');

//zamiana naszego ciagu znaków na tablicę w PHP
$arr = (json_decode($data, true));

require_once "connect.php";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name) or die ("Błąd");  //połączenie z bazą 
	
for($i=0;$i<10;$i++)
{
echo $arr[$i]["time"];
echo " ";
echo $arr[$i]["temp"];
echo "\n";

$time = $arr[$i]["time"];
$temp = $arr[$i]["temp"];
$light = $arr[$i]["light"];
$desireTemp = $arr[$i]["desireTemp"];
$heaterOn = $arr[$i]["heaterOn"];
$sql = $polaczenie->query("INSERT INTO dane(Data,Temperatura,Nasłonecznienie,TempZadana,Stan) VALUES('".$time."','".$temp."','".$light."','".$desireTemp."','".$heaterOn."')");

}











?>


</body>
</html>