<?php

//unset($_COOKIE['user']);
setcookie ("user", "", time() - 3600); // set the expiration date to one hour ago

// Jump to login page
header('Location: index.php');

?>