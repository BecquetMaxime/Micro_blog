<?php
include('includes/connexion.php');

$idd= $_GET['id'];


if ($a=='sup'){

$sql="UPDATE messages SET ..... WHERE id=:id";
    
    
    
$prep=$pdo->prepare($sql);
$prep->bindValue(':id', $_GET['id']);
$prep->execute();
header("Location:index.php");
exit();
    
}


?>