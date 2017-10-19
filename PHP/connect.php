<?php 
include('includes/haut.php');
include('includes/connexion.php');


if(isset($_POST['email']))
{
    
    
    
    
}






?>


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
                            $sql="SELECT * FROM messages WHERE id=:id";
                            

                           echo "<input type='email' id='email' name='email' class='form-control' placeholder='email'>
                           </input>";
                            echo "</br>";
                            echo "<input type='password' id='password' name='password' class='form-control' placeholder='password'>
                           </input>";
                            
                            echo "</br>";
                            echo "<button type='submit' class='btn btn-success btn-lg'>Envoyer</button>"
                            ?>
                            
                        </div>
                    </div>
                                    
                </form>
            </div>

            
            






<?php
include('includes/bas.php');

?>