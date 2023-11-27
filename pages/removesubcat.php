<?php 
    include 'connexion.php';
    $id = $_GET['souCategoryID'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM souscategories WHERE SubcategoryID=$id");
        $stmt -> execute();
    }
    header('location:SousCategory.php');
?>