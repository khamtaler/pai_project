<?php
require 'database.php';
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_GET['submit'])){
    $login = $_GET['login'];
    $password = $_GET['password'];
    $data = [
        'login' => $login,
        'password' => md5($password)
    ];
    $sql = "INSERT INTO user (login, password) VALUES (:login, :password)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    echo "<h1>zarejestrowano</h1>";
} else {
?>

    <form method="GET" action="register.php">
        <input name="login" type="text">
        <input name="password" type="password">
        <input name="submit" type="submit" value="Zarejestruj">
    </form>
<?php
}

?>

