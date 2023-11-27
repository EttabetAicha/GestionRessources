<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    $userName = $_POST['name'];
    $userImg = $_FILES['img']['name']; 
    $userEmail = $_POST['Email'];
    $userPassword = $_POST['Password'];
    $userRoles = $_POST['Roles'];

    $targetDirectory = "../images/";
    $targetFilePath = $targetDirectory . basename($userImg);
    move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath);

    $insertQuery = "INSERT INTO utilisateurs (NomUtilisateur, img, Email, password, Roles) 
                    VALUES (:userName, :userImg, :userEmail, :userPassword, :userRoles)";

    $statement = $con->prepare($insertQuery);

    $statement->bindParam(':userName', $userName);
    $statement->bindParam(':userImg', $userImg);
    $statement->bindParam(':userEmail', $userEmail);
    $statement->bindParam(':userPassword', $userPassword);
    $statement->bindParam(':userRoles', $userRoles);
    $result = $statement->execute();
    if ($result) {
        header('location:Users.php');
        echo "User created successfully!";
    } else {
        echo "Error creating user: " . $statement->errorInfo()[2];
    }
}
?>
