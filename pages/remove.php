<?php 
    include 'connexion.php';
    $id = $_GET['UserID'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM utilisateurs WHERE UserID=$id");
        $stmt -> execute();
    }
    header('location:Users.php');
?>