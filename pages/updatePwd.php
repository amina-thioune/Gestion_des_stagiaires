<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');

        $idUser=$_SESSION['user']['iduser'];
        $oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";
        $newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

        $requete="select * from utilisateur where iduser='$idUser' and pwd=MD5('$oldpwd')";
        $resultat=$pdo->prepare($requete);
        $resultat->execute();
         
        $msg;
        $interval=3;
        $url="login.php";

        if($resultat->fetch()){
            session_destroy();
            $requete="update utilisateur set pwd=MD5(?) where iduser=?";
            $params=array($newpwd,$idUser);
            $resultat=$pdo -> prepare ($requete);
            $resultat -> execute ($params);
            $msg="<div class='alert alert-success'>
                    <strong>Félicitation! </strong>Votre mot de passe a été modifié avec succès!!!
                  </div>";          
        }else{
            $msg="<div class='alert alert-danger'>
                    <strong>Erreur!!! </strong>L'ancien mot de passe est incorecte!!!
                 </div>";          
            $url=$_SERVER['HTTP_REFERER'];
        }

        
?> 

<!DOCTYPE HTML>
<HTMl>
    <head>
        <meta charset="utf-8">
        <title>Changement de mot de passe</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet"  href = "../css/monstyle.css" type="text/css">
        <script src="../js/monscript.js"></script>
        
    </head>

    <body>
        <div class="container margetop">
            <?php 
                echo $msg ;
                header('refresh:'.$interval.';url='.$url);
            ?> 
        </div>
    </body>
</HTMl>
        