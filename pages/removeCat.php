<?php 
    include 'connexion.php';
    $id = $_GET['CategoryID'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM categories WHERE CategoryID=$id");
        $stmt -> execute();
    }
    header('location:Category.php');
?>