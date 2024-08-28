<?php 
        session_start(); //pour demarer la session
        require_once ('connexionbd.php');
        
        $login=isset($_POST['login'])?$_POST['login']:"";
        $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
        $requete="select * from utilisateur where login='$login' and pwd=MD5('$pwd')";
        $resultat=$pdo->query($requete);
        
        
        if($user=$resultat->fetch()){
                if($user['etat']==1){
                        $_SESSION['user']=$user;
                        $_SESSION['user']['pwd']=$pwd;

                        header('location:../index.php');
                
                }else{
                        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé <br> Veillez contacter l'administrateur";
                        header('location:login.php');
                }
        }else{
                $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
                header('location:login.php');
        }

?> 