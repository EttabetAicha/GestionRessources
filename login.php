<?php
session_start();
if (isset($_POST['submit'])) {
    include './pages/connexion.php';
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $requete = "SELECT * FROM utilisateurs WHERE Email = '$email' and password = '$password'";
    $statment = $con->prepare($requete);
    $statment->execute();
    $result = $statment->fetch();
    if ($result['Email'] === $email && $result['password'] === $password) {
        $_SESSION['name'] = $result['NomUtilisateur'];
        $_SESSION['role'] = $result['Roles'];
        $_SESSION['email'] = $result['Email'];
        $_SESSION['password'] = $result['password'];
        if (isset($_POST['check'])) {
            setcookie('email', $_SESSION['email'], time() + 3600);
            setcookie('password', $_SESSION['password'], time() + 3600);
        }
        header("location:./pages/dashboard.php");
    } else if (empty($email) || empty($password)) {
        header("location:index.php?error=please enter your email or password");
    } else {
        header("location:index.php?error=email or password not found");
    }
}
