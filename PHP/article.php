<?php
include('includes/connexion.php');

$a= $_GET['a'];


if ($a=='sup'){

$sql="DELETE FROM messages WHERE id=:id";
$prep=$pdo->prepare($sql);
$prep->bindValue(':id', $_GET['id']);
$prep->execute();
header("Location:index.php");
exit();
    
}else{
$sql=" INSERT INTO messages (contenu,date) VALUES (:contenu,UNIX_TIMESTAMP())";
$prep=$pdo->prepare($sql);
$prep->bindValue(':contenu', $_POST['message']);
$prep->execute();
}


?>