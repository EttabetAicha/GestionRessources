<?php
if (isset($_POST['submit'])) {
    include './pages/connexion.php';
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
        var_dump($userName);
        $requete = $con->prepare("INSERT INTO utilisateurs(NomUtilisateur,Email,password)
            VALUES('$userName','$email','$pass')");
        $requete->execute();
        header('location:index.php');
    
}
