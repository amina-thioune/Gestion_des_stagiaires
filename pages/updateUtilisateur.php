<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');

        $idUser=$_SESSION['user']['iduser'];
        $login=isset($_POST['login'])?$_POST['login']:"";
        $email=isset($_POST['email'])?$_POST['email']:"";
        $_SESSION['user']['login']=$login;
        $_SESSION['user']['email']=$email;
        
        $requete="update utilisateur set login=?,email=? where iduser=?";
        $params=array($login,$email,$idUser);
             
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:login.php')
?> 
