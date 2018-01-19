<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "vojna_baza";
$con = mysqli_connect($host, $user, $pass, $db) or die(mysql_error());
// isset sluzi za provjeru da li ova vrijednost ima ikakvu akciju ili ne
    if(isset($_POST['submit']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        // username and password ne moze biti prazan i zato se provjeravaju da li su prazni prije izvrsavanja u daljem kodu
        if(!empty($user) && !empty($pass))
        {
            // poziv za konekciju s bazom
          //  include 'connection.php';
            // upit na bazu
            $login="select username from vojna_lica where username = '$user' && password='$pass' UNION select username from ministar_odbrane where username  = '$user' and password='$pass' UNION 
                 select username from vrhovni_komadant where username  = '$user' and password='$pass'"; 
            $mysql_query=$con->query($login);
            if(mysqli_num_rows($mysql_query) == 1)
            {
              //  echo Dobrodosli na profil " .$user;
                setcookie('user', $user, time()+86400, '/');
                setcookie('pass', $pass, time()+86400, '/');
                if($user == "zoran.djordjevic" && $pass == "zoran.djordjevic123")
                {
                    header('Location: profilMinistarOdbrane.php');
                }
                else if($user == "anto.jelec" && $pass == "anto.jelec123")
                {
                    header('Location: profilVrhovniKomandant.php');
                }
                else
                {
                    header('Location: profile.php');
                }
            }
            else
            {
                echo 'can\'t be login';
            }
        }
    }

?>




<!DOCTYPE html>
<html>
<style>
form {
    border: 3px solid #f1f1f1;
    border-radius: 10px;
    margin-left: 100px;
    margin-right: 100px;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #1B8D98;
    color: white;
    padding: 14px 20px;
    margin-left: 0px;
    border: none;
    cursor: pointer;
    width: 100%;
    
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 16px 0;
}

img.avatar {
    width: 20%;
    border-radius: 40%;
}

.container {
    padding: 16px;
    margin-left: 300px;
    margin-right: 300px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body background="PozadinaHedera.jpg">


<h2 text align="center"><font size="10" color="#1B8D98"><b>Vojna baza</b></font></h2>

<form method="POST"  action="index.php">
  <div class="imgcontainer">
    <img src="Logo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">

  <p><font size="4"> <b>Username <br><input type="text" name="user" size="40"><br></b> </p>
    <b>Password <br><input type="password" name="pass" size="40"><br> </b>
    <button class="button" type="submit" name="submit"><b>Log In</b></button>

  </div>
</form>

</body>
</html>
