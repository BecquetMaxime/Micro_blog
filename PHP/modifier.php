<?php
include('includes/connexion.php');

$mod= $_GET['id'];
/*

if ($b=='mod'){
/*
$sql="DELETE FROM messages WHERE id=:id";
$prep=$pdo->prepare($sql);
$prep->bindValue(':id', $_GET['id']);
$prep->execute();
    */
header("Location:modif2.php");
exit();
 /*   
}
*/

?>