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
	$SQL = "SELECT * FROM vojna_lica WHERE username='$user' LIMIT 1";
	$result = $con->query($SQL);
	while($row=mysqli_fetch_array($result))
	{
		$info['ime']=$row['ime'];
		$info['prezime']=$row['prezime'];
		$info['datum_rodjenja']=$row['datum_rodjenja'];
		$info['mjesto_rodjenja']=$row['mjesto_rodjenja'];
		$info['jmbg']=$row['jmbg'];
		$info['datum_ulaska_u_vojsku']=$row['datum_ulaska_u_vojsku'];
		$info['datum_izlaska_iz_vojske']=$row['datum_izlaska_iz_vojske'];
		$info['stepen_obrazovanja']=$row['stepen_obrazovanja'];
		$info['nacionalnost']=$row['nacionalnost'];
		$info['zdravstveni_pregled_(DA/NE)']=$row['zdravstveni_pregled_(DA/NE)'];
		$info['tezina']=$row['tezina'];
		$info['visina']=$row['visina'];
		$info['krvna_grupa']=$row['krvna_grupa'];
		$info['status']=$row['status'];
		$info['id_ratiste']=$row['id_ratiste'];
		$info['spol']=$row['spol'];
		$info['bracni_status']=$row['bracni_status'];
		$info['id_zaduzenje_oruzja']=$row['id_zaduzenje_oruzja'];
		$info['nagrade']=$row['nagrade'];
		$info['datum_osvajanja_nagrade']=$row['datum_osvajanja_nagrade'];
		$info['napomena']=$row['napomena'];
		$info['username']=$row['username'];
		$info['password']=$row['password'];
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
						<li><a href="profile.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Lični podaci </b></font></a></li>
						<li><a href="ratiste1.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Ratišta </b></font></a></li>
						<li><a href="oruzje1.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Oružje </b></font></a></li>
						<li><a href="dodatno1.php"><font size="4" color="#1B8D98" style="font-family: georgia"><b>Dodatni podaci</b></font></a></li>
				</ul>
	       </div>
	    </div>
	    <div class="NaslovnaDesna1">

	    	<table width="100%" height="100%">
				<tr>
				<th width="40%" height="40%" text align="center"><img src="vojnik.png" width="130" height="180"></th><th text align="center">
						<p><font size="5" color="white">
							<?php echo $info['ime']; ?>
							<?php echo $info['prezime']; ?>
						</font></p>
						<p><font color="white">Vojnik</font></p>
					</th>
				</tr>
				<tr>
				<td text align="center"><p><font size="5" color="white">Osnovne informacije: </font></p>
					<p><font color="white">Datum rođenja :<?php echo $info['datum_rodjenja']; ?> </font></p>
					<p><font color="white">Mjesto rođenja: <?php echo $info['mjesto_rodjenja'] ;?></font></p>
					<p><font color="white">Jmbg: <?php echo $info['jmbg'] ;?> </font></p>
					<p><font color="white">Nacionalnost: <?php echo $info['nacionalnost'] ;?> </font></p>
				</td>
				<td text align="center">
					<p><font size="5" color="white"> Kontakt informacije:</font></p>
					<p><font color="white">e-mail: <?php echo $info['ime']; ?><?php echo $info['prezime']; ?>@gmail.com</font></p>
					<p><font color="white">telefon: 062-376-124</font></p>
				</td>
				</tr>
				</table>


	    </div>
	</div>

	<div class="footer">
	  <div class ="TextFooter">
	  <p> Copyright © Software Soldiers </p>
	  </div>
	</div>
	</body>
</html>