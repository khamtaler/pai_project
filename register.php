<?php
require 'database.php';


session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit;
}


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
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

    <form method="POST" action="register.php">
        <input name="login" type="text">
        <input name="password" type="password">
        <input name="submit" type="submit" value="Zarejestruj">
    </form>
<?php
}

?>

