<?php
	if(!isset($_COOKIE['user']) && !isset($_COOKIE['pass']))
	{
		header("Location: index.php");
	}

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "vojna_baza";
	$con = mysqli_connect($host, $user, $pass, $db) or die(mysql_error());
	// this sql statement use to get all information user login
	//include 'connection.php';
	$user = $_COOKIE['user'];
	$SQL = "SELECT * FROM ministar_odbrane WHERE username='$user' LIMIT 1";
	$result = $con->query($SQL);
	while($row=mysqli_fetch_array($result))
	{
		$info['prebivaliste']=$row['prebivaliste'];
		$info['zvanje']=$row['zvanje'];
		$info['stepen_obrazovanja']=$row['stepen_obrazovanja'];
		$info['drzavljanstvo']=$row['drzavljanstvo'];
		$info['datum_stupanja_u_sluzbu']=$row['datum_stupanja_u_sluzbu'];
		$info['trajanje_mandata']=$row['trajanje_mandata'];
	}

?> 

<html>
	<head>

	<title>
		Vojna baza
	</title>
	<link rel="stylesheet"  href="izgled.css">
	<meta charset="utf-8"> </meta>
	</head>

	<body>
	<div class="header">
		<div class ="PomjeriLogo">
		    <img src="Logo.png" width="150" height="140">
		</div>
		<div class="TextHeder">
		    <p><font size="8" color="#1B8D98" style="font-family: georgia"><b> Vojna baza </b> </font> </p>
		</div>
		 <div class="PomjeriLogout">
	  <a href="logout.php"><img src="Logout.png" width="60" height="60" ></a>
	  </div>
	</div>
		<div class="Naslovna">
		<div class="NaslovnaLijeva">
	       <div class="nav">
	       <br>
	         	<ul>
						<li><a href="profilMinistarOdbrane.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Lični podaci </b></font></a></li>
						<li><a href="dodatniPodaciMinistar.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Dodatni podaci </b></font></a></li>
				</ul>
	       </div>
	    </div>
	    <div class="NaslovnaDesna">
	   		<p class="Text"><b>Dodatni podaci: </b></p><br>
	   		<div class="Text1">
	   		<ul>
	   		<li>Prebivaliste: <?php echo $info['prebivaliste'] ;?></li><br>
	   		<li>Zvanje: <?php echo $info['zvanje'] ;?> </li><br>
	   		<li>Stepen obrazovanja: <?php echo $info['stepen_obrazovanja'] ;?> </li><br>
	   		<li>Drzavljanstvo: <?php echo $info['drzavljanstvo'] ;?> </li><br>
	   		<li>Datum stupanja u sluzbu: <?php echo $info['datum_stupanja_u_sluzbu'] ;?> </li><br>
	   		<li>Trajanje mandata: <?php echo $info['trajanje_mandata'] ;?> </li><br>
	   		</ul>
	   		</div>
	    </div>
	</div>

	<div class="footer">
	  <div class ="TextFooter">
	  <p> Copyright © Software Soldiers </p>
	  </div>
	</div>
	</body>
</html>