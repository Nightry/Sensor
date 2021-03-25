<?php
session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) 
	{
		header('Location: odczytlocal.php');								
		exit();
	}

?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Logowanie</title>
</head>
<body>
<div id="login">
<form action = "login.php" method="post"> 	
Login: <br/> <input type="text" name="login" /> <br/>				
Hasło: <br/> <input type="password" name="haslo" /> <br/>	
<input type="submit" value="Zaloguj"/>	
</div>
<?php
if(isset($_SESSION['blad']))									
{
	echo $_SESSION['blad'];
}
?>
</body>
</html>

