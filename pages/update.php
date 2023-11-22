<?php
// update.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    try {
        // Get form data
        $img = $_FILES['img']['name'];
        $name = $_POST['name'];
        $email = $_POST['Email'];
        $roles = $_POST['Roles'];
        $password = $_POST['Password'];

        // Perform the database update
        include 'connexion.php';

        // Assuming $userID is defined somewhere in your code
        $userID = $_POST['userID'];

        // Prepare the SQL statement with parameters to prevent SQL injection
        $stmt = $con->prepare("UPDATE utilisateurs SET img  = ?, NomUtilisateur = ?, Email = ?, password = ?, Roles = ? WHERE UserID = ?");
        $stmt->bindParam(1, $img);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $password);
        $stmt->bindParam(5, $roles);
        $stmt->bindParam(6, $userID);

        // Execute the statement
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            header("Location: Users.php");
            exit(); echo "Record updated successfully";
        } else {
            // No rows were affected, so the record might not exist
            echo "No records updated. User ID $userID may not exist.";
        }

        // Close the statement and connection
        if ($con instanceof mysqli) {
            // $con is a valid mysqli object
            $con->close();
        } else {
            // $con is not a valid mysqli object
            echo "Invalid mysqli object";
        }
    } catch (Exception $e) {
        // Handle exceptions (errors)
        echo "Error updating record: " . $e->getMessage();
    }
}
?>
