<?php 
    require_once("connexionbd.php");
    require_once('../fonctions/fonctions.php');

    if(isset($_POST['email']))
        $email=$_POST['email'];
    else
        $email="";

    $user=rechercher_user_par_email($email);

    if($user!=null) {    
        $id=$user['iduser'];
        $requete=$pdo->prepare("update utilisateur set pwd=md5('0000') where iduser=$id");
        $requete->execute();

        $to=$email;
        $objet="Initialisation de mot de passe";
        $content="Votre nouveau mot de passe est 0000, veuillez le modifier à la prochaine ouverture de session";
        $entete="From : Application Gestion de Stagiaire". "\n"."Cc : aminatathioune123@gmail.com";
        mail($to,$objet,$content,$entete); 
        $msg="un message a été envoyé dans votre boîte mail";
    }else {
        $msg="Email incorrect";
        
    }

?>


<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Initialiser le mot de passe</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel = "stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet"  href = "../css/monstyle.css">
    </head>

    <body>
              
        <div class="container col-lg-6 offset-lg-3 col-md-6  offset-md-3">

            <div class="panel panel-primary margetop">
                 <div class="panel-heading"> Initialiser votre mot de passe </div>
                    <div class="panel-body">
                        <form method="post"  class="form">
                            <div class="form-group">
                                <label for="login"> Veiller saisir votre email de récupération </label>
                                <input type="email" name="email" class="form-control">
                            </div> 

                            <button type="submit" class="btn btn-success">Initialiser le mot de passe</button>
                            <br> <br>
                            <?php                             
                                if(!empty($to)) {   
                                    echo '<div class="alert alert-success"> '.$msg .'</div> ' ;
                                }else{   
                                    echo '<div class="alert alert-danger"> '.$msg .'</div> ' ;
                                }
                            ?> 

                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </body>
</HTMl>
