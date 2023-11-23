<?php
// updatecat.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    try {
        include 'connexion.php';

        $name = $_POST['namecat'];
        $categoryID = $_POST['idcat'];

        $stmt = $con->prepare("UPDATE categories SET NomCategorie = :name WHERE CategoryID = :categoryID");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':categoryID', $categoryID);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: Category.php");
            exit();
        } else {
            echo "No records updated. Category ID $categoryID may not exist.";
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
