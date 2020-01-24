<?php

require 'database.php';

session_start();

if(!isset($_SESSION['user_id']) || !isset($_POST['submit'])){
    header('Location: profile.php');
    exit;
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = $_POST['imie'];
$surename = $_POST['nazwisko'];
$email = $_POST['email'];
$date_of_birth = $_POST['data_urodzenia'];
$address = $_POST['adres'];
$password = $_POST['haslo'];
$data = [
    'id' => $_SESSION['user_id'],
    'imie' => $name,
    'nazwisko' => $surename,
    'email' => $email,
    'data_urodzenia' => $date_of_birth,
    'adres' => $address,
];

if ($password !== '') {
    $data['haslo'] = md5($password);
}

$sql = isset($data['haslo']) ?
    "UPDATE personal_data AS pd, user AS u 
SET pd.name=:imie, pd.surname=:nazwisko, pd.email=:email,
pd.date_of_birth=:data_urodzenia, pd.address=:adres, u.password=:haslo
WHERE pd.user_id=:id AND u.id=:id"
:
    "UPDATE personal_data
SET name=:imie, surname=:nazwisko, email=:email,
date_of_birth=:data_urodzenia, address=:adres
WHERE user_id=:id";

$stmt= $pdo->prepare($sql);
$result = $stmt->execute($data);

if($result == 1 ){
    echo "zmieniono dane";
} else{
    echo "nie zmieniono danych";
}

