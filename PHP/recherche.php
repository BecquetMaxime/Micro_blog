
<?php
include('includes/haut.php');
include('includes/connexion.php');
if(isset($_POST['recherche']) && $_POST['recherche'] != NULL){

    $recherche = htmlspecialchars($_POST['recherche']); // htmlspecialchars convertit les caractères spéciaux en entités HTML pour ne pas avoir de problemes de saisie lors de la recherche ( comme avec un & par exemple )
    
    $req = $pdo->prepare("SELECT * FROM messages WHERE contenu LIKE :recherche "); // Recherche dans la table messages les messages dont le contenu contient le mot clé recherché
    $req->execute(array('recherche' => '%' . $recherche . '%'));


    $nb_resultats = $req->rowCount(); // On compte les résultats pour vérifier qu'il y en a
   
    if($nb_resultats != 0){ // si le nombre de résultats est supérieur à 0, cela veut dire qu'il y a donc des messages contenant le mot clé dans 1 ou plusieurs messages et donc on entre dans la boucle

    ?>
    <br/><br/><br/><br/>

    <h3>Résultat(s) de la recherche.</h3>
    <p> Mot(s) clé(s) choisit : 
        <?php   // rappel du mot clé choisi.
        echo $recherche;
        ?>
    </p>

<p>Nous avons trouvé 
    <?php echo $nb_resultats; // on affiche le nombre de résultats
                echo 'resultat(s)';
    ?>
Voici les résultats:<br/><br/><br/>
    
    <?php
    while($data = $req->fetch()) // on fait un while comme dans l'index afin d'afficher les messages comportant le mot clé.
    {
        
        $suppr=$data['id'];
         $modifier=$data['id'];
        echo "<blockquote>";
        echo $data['contenu'];
        echo "</br>";
        date_default_timezone_set("Europe/Paris");
        echo "<footer>";
        echo "Message posté le ";
        echo date("d/m/y à H:i:sa",$data['date']);
        echo "</footer>";
        echo "</blockquote>";
    }
    ?><br/><br/><br/>
    <a href="recherche.php">Faire une nouvelle recherche</a>
    <br/>
    <a href="index.php">Retourner a l'index du micro_blog</a>
</p>
    <?php
    } // Fin d'affichage des résultats
    else
    {
    ?>
<br/><br/><br/><br/>
    <h3>Pas de résultats</h3>
    <p>Aucun résultat pour le mot clé : "<?php echo $recherche; ?>". <br/> <a href="recherche.php">Réessayez</a> avec autre chose.</p>
    <?php
    }// fin de l'affichage des erreurs
    $req->closeCursor(); // on ferme mysql
    }
else
{ // formulaire html pour realiser une nouvelle recherche.
?>
<br/><br/><br/><br/><br/>
<p>Tapez une requête pour réaliser une recherche.</p>
 <br><br><form action="recherche.php" method="Post">
<input type="text" name="recherche" size="20">
<input type="submit" value="Ok">
</form>
<?php
}
// fin
?>