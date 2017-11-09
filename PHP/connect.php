

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">CONNEXION</span>
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
                <form method="POST" action="connect.php">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            
<?php
include('includes/haut.php');
include('includes/connexion.php');

    // Utili ok? ( where email=:email and mdp=:mdp)
 
/* WHERE email='{$email}' AND password='{$password}' */       
$sql="SELECT * FROM utilisateur";
$prep=$pdo->query($sql);
$prep->fetchAll();
print_r($prep);

                            

                           echo "<input type='email' id='email' name='email' class='form-control' placeholder='email'>
                           </input>";
                            echo "</br>";
                            echo "<input type='password' id='password' name='password' class='form-control' placeholder='password'>
                           </input>";
                            echo "<input type='checkbox' id='check' name='check'> Se souvenir de moi </input>";
                            echo "</br>";
                            echo "<button type='submit' class='btn btn-success btn-lg'>Envoyer</button>";
                            
    

  
    /* //md5($_POST['email'].time())
    $sid=md5($_POST['email'].time());
    //MAJ BDD ( UPDATE utilisateur SET sid=sid where email=email)
   $sqll="UPDATE utilisateur SET sid={$sid} WHERE email={$_POST['email']}";
    $prep=$pdo->prepare($sqll);
    $prep->execute();
    // creation cookie
    // redirection
    
           */       

                           
                            
                ?>
                        </div>
                    </div>
                                    
                </form>
            </div>

            
           





<?php
include('includes/bas.php');
            

?>