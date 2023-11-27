<?php
// updatesouscat.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    try {
        include 'connexion.php';

        $souscatName = $_POST['Souscategory_name'];
        $souscategoryID = $_POST['souscategoryid'];
        $categoryID = $_POST['categoryid'];

        $stmt = $con->prepare("UPDATE souscategories SET NomSousCategorie = :souscatName, CategoryID = :categoryID WHERE SubcategoryID = :souscategoryID");
        $stmt->bindParam(':souscatName', $souscatName);
        $stmt->bindParam(':categoryID', $categoryID);
        $stmt->bindParam(':souscategoryID', $souscategoryID);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: SousCategory.php");
            exit();
        } else {
            echo "No records updated. SousCategory ID $souscategoryID may not exist.";
        }

        $stmt = null;

        if ($con instanceof PDO) {
            $con = null;
        } else {
            echo "Invalid PDO object";
        }
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}
?>
