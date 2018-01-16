<?php 
include('includes/haut.php');
include('includes/connexion.php');
?>
    

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">LE FIL</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>




    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">              
                <form method="POST" action="message.php">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            
                            
            
                            
                            <?php
                            if(isset($_SESSION['username'])){
    	                       echo "<h1 class='bonjour'>Bonjour, ".$_SESSION['username']."</h1>";
                            }
    
                            
                           echo "<textarea id='message' name='message' class='form-control' placeholder='Message'>Message </textarea>";
                            echo "<input type='hidden' name='id' value=>";
                            
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>                        
                </form>
            </div>
            
            
            <!-- RECHERCHE --> 
            
            <h3> Recherche:</h3>
                            <!-- On realise un form qui a pour action le fichier recherche.php qui aura pour but de rechercher les messages comportant les mots clefs saisis. --> 
                            <form action="recherche.php" method="Post">
                            <input type="text" name="recherche" placeholder="Mot(s) clé(s) " size="20">
                            <input type="submit" value="envoyer">                           
                            </form>
           
            
            
<?php
     
            
    $nbrmsgparpage = 3 ;

  $sql="SELECT * FROM messages ORDER BY date desc";

  $req = $pdo->prepare($sql);
  $req->execute();
  $array = $req->fetchALL();
  $nb_lignes = count($array); 
  

  $nb_pages=ceil($nb_lignes/$nbrmsgparpage); // Ceil permet d'arrondir au nombre superieur si le nombre n'est pas exact.
  

  if(isset($_GET['page'])) // Test si la variable $_GET['page'] existe
  {
       $pageActuelle=intval($_GET['page']); // intval utilisé pour retourner la valeur en entiere

       if($pageActuelle>$nb_pages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombredepages ALORS
       {
            $pageActuelle=$nb_pages;
       }
  }
  else // Sinonn
  {
       $pageActuelle=1; 
  }

  $premiereEntree=($pageActuelle-1)*$nbrmsgparpage; // On calcule la premiere entree à lire

  // La requête sql pour récupérer les messages de la page actuelle.

  $retour_messages="SELECT * FROM messages LIMIT $premiereEntree, $nbrmsgparpage";

  
      $stmt=$pdo->query($retour_messages);
      while($data=$stmt->fetch()){

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
        
          echo "<a href='modif2.php?b=mod&id=$modifier'class='btn btn-primary' >Modifier</a> ";
        
        
        echo "<a href='supprimer.php?a=sup&id=$suppr'class='btn btn-danger' >Supprimer</a> ";
        echo "</br>";
        echo "</br>";
      }


echo 'Page : ';
  for($i=1; $i<=$nb_pages; $i++) //On fait la boucle pour afficher la paginatio en dessous des messages
  {
       
       if($i==$pageActuelle) //S'il n'y a que une page est ue c'est la seule page alors on affiche seulement $i 
       {
           echo $i;
       }
       else //Sinon on afficher les pages supplémentaires sous forme de balise <a> pour pouvoir acceder aux autres pages de message.
       {
            echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
       }
  }
            
            
            
?>
            
            
            
        
            
            
        </div>
    </section>
    
    <?php
     include('includes/bas.php');
    ?>