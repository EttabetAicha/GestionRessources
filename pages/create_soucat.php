<?php
include 'connexion.php';


if (isset($_POST['submit'])) {
    $catid = $_POST['categoryid'];
    $souscatName = $_POST['Souscategory_name'];
    $souscatid = $_POST['souscategoryid'];

    $insertQuery = "INSERT INTO souscategories (SubcategoryID, NomSousCategorie, CategoryID) 
                    VALUES (:subcatid, :souscatName, :catid)";
    $statement = $con->prepare($insertQuery);
    $statement->bindParam(':subcatid',  $souscatid);
    $statement->bindParam(':souscatName', $souscatName);
    $statement->bindParam(':catid', $catid);

    $result = $statement->execute();
    if ($result) {
        header('location:SousCategory.php');
        echo "Subcategory created successfully!";
    } else {
        echo "Error creating subcategory: " . $statement->errorInfo()[2];
    }
}
?>