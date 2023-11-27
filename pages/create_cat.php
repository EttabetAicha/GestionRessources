<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    $catid = $_POST['categoryid'];
    $catName = $_POST['category_name'];

  
    $insertQuery = "INSERT INTO categories (CategoryID,NomCategorie) 
                    VALUES (:catid,:catName )";

    $statement = $con->prepare($insertQuery);

    $statement->bindParam(':catid', $catid);
    $statement->bindParam(':catName', $catName);
    
    $result = $statement->execute();
    if ($result) {
        header('location:Category.php');
        echo "cate created successfully!";
    } else {
        echo "Error creating user: " . $statement->errorInfo()[2];
    }
}
?>
