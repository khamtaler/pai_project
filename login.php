<?php
//$stmt = $pdo->query('SELECT id, login, password, created_at FROM user');

session_start();
require 'database.php';

//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_GET['login'])){

    //Retrieve the field values from our login form.
    $username = !empty($_GET['username']) ? trim($_GET['username']) : null;
    $passwordAttempt = !empty($_GET['password']) ? trim($_GET['password']) : null;

    //Retrieve the user account information for the given username.
    $sql = "SELECT id, login, password FROM user WHERE login = :username";
    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':username', $username);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if($user === false){
        $loginError = 'Bledne dane';
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        //$validPassword = password_verify($passwordAttempt, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if($user['password'] == md5($passwordAttempt)){

            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header('Location: profile.html');
            exit;

        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="login.php" method="get">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password</label>
    <input type="text" id="password" name="password"><br>
    <input type="submit" name="login" value="Login">
</form>
<?php
if($loginError) {
    ?>
    <p></p>
<?php
}
?>
</body>
</html>