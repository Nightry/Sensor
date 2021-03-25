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

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name) or die ("Błąd");  
$wynik = $polaczenie->query("SELECT Lp,Data, Temperatura, Nasłonecznienie, TempZadana, Stan FROM dane");

$Sun = array();
while($wiersz = $wynik->fetch_object())
		{
			$Sun[] = array("x" => $wiersz->Lp  ,"y" => $wiersz->Nasłonecznienie);
				
		}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Nasłonecznienie"
		
	},
	axisX: {
		title: "Lp"
	},
	data: [{
		type: "line",
		dataPoints: 
		<?php echo json_encode($Sun, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                           