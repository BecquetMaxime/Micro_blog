

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
session_start();
if(isset($_POST['connex'])){
	$_SESSION['username'] = $_POST['userid'];
}
if(isset($_POST['deco'])){
	session_destroy();
	header("Refresh:0");
}
                            
if(isset($_SESSION['username'])){
    	echo "<h1 class='bonjour'>Bonjour, ".$_SESSION['username']."</h1>";
    	echo "<form action='index.php' method='POST' class='formul'><button class='deco' name='deco'>Se deconnecter </button></form>";

    }
        
	if(!isset($_SESSION['username'])){   
    echo "<form action='index.php' method='POST' class='formul'><input type='text' placeholder='adresse mail' name='userid' id='userid' class='userid'/><input type='password' placeholder='Mot de passe' name='pass' id='pass' class='pass' /><button class='connex' name='connex'>Se connecter </button></form>";
    }                        
                            
                            
    // Utili ok? ( where email=:email and mdp=:mdp)
 
/* WHERE email='{$email}' AND password='{$password}' */ 
                            
                            

                           
   /*                         
$sid=$data['email'].time();                            
$sqll="UPDATE utilisateur SET sid=$sid WHERE email={$data['email']}";
$prep=$pdo->query($sqll);
                            
                            
$sql="SELECT * FROM utilisateur";
$stmt=$pdo->query($sql);
$data=$stmt->fetch();
                            
*/
     
                            /*

                           echo "<input type='email' id='email' name='email' class='form-control' placeholder='email'>
                           </input>";
                            echo "</br>";
                            echo "<input type='password' id='password' name='password' class='form-control' placeholder='password'>
                           </input>";
                            echo "<input type='checkbox' id='check' name='check'> Se souvenir de moi </input>";
                            echo "</br>";
                            echo "<button type='submit' class='btn btn-success btn-lg'>Envoyer</button>";
                            
                            */

  
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