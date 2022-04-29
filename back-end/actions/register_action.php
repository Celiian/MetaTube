<?php
require_once __DIR__. '/../db.php';
session_start();


if(empty( $_POST['email']) ||  empty( $_POST['username']) || empty( $_POST['password']) ){
    $_SESSION['signup_error']= "r";
    header("Location: /register ");
    die();
}

if(!ctype_alnum($_POST['username'])){
    $_SESSION['signup_error']= "Pseudo invalide";
    header("Location: /register ");
    die();
}
$profilNull = 'https://images.unsplash.com/photo-1551373884-8a0750074df7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80';
$email =filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
if($email == false){
    $_SESSION['signup_error']= "Email invaldie";
    header("Location: /register ");
    die();
}
$password = hash('sha256',$_POST['password']);

$sql = 'SELECT * FROM users WHERE  email = :email OR  username = :pseudo';
$query = $db->prepare($sql);

$query->execute([
    ':email' => $email,
    ':pseudo' => $_POST['username']
]);

$data = $query->fetch(PDO::FETCH_ASSOC);

if($data){
    $_SESSION['signup_error']= "Email / pseudo deja utilise";
    header("Location: /register ");
    die();
}
$sql = 'INSERT INTO users(email, username, password, photoProfil) VALUES (:email, :pseudo, :password, :photoProfil)';

$query = $db->prepare($sql);
$query->execute([
	':email' => $email,
	':pseudo' => $_POST['username'],
	':password' => $password,
    ':photoProfil' => $profilNull
]);
header("Location: /login ");

?>