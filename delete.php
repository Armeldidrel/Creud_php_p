<?php
include_once 'config.php';
if (isset($_GET['id'])) {
    $_id_to_delete = $_GET['id'];
    $Delete = $conn->prepare("DELETE FROM pers WHERE id = :id_user");
    $Delete->bindParam(":id_user", $_id_to_delete);
    $Delete->execute();

    
}
header('location:index.php');
?>
