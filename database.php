<?php
$mysql_host = 'so149.sohost.pl';
$port = '3306';
$username = 'so149_ts';
$password = 'kaerka123';
$database = 'so149_gym';

try{
    $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
 //   echo 'Połączenie nawiązane!';

}catch(PDOException $e){
    echo 'Połączenie nie mogło zostać utworzone.<br />';
}

?>