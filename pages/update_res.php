<?php
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $resourceId = $_POST['ResourceID'];
    $squadId = $_POST['SquadID'];
    $projectId = $_POST['ProjectID'];



    $updateQuery = $con->prepare("UPDATE ressources SET SquadID = ?, ProjectID = ? WHERE ResourceID = ?");
    $updateQuery->execute([$squadId, $projectId, $resourceId]);

    // Check for errors
    $errorInfo = $updateQuery->errorInfo();
    if ($errorInfo[0] != "00000") {
        print_r($errorInfo);
    } else {
        header('location:Resources.php');
    }
}
