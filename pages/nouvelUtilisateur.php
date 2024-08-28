<?php 
    require_once('connexionbd.php');
    require_once('../fonctions/fonctions.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $login=$_POST['login'];
        $pwd1=$_POST['pwd1'];
        $pwd2=$_POST['pwd2'];
        $email=$_POST['email'];
       
        $validationErrors=array();

        if(isset($login)){
            $filtreLogin=filter_var($login,FILTER_UNSAFE_RAW); 

            if(strlen($filtreLogin)<4){
                $validationErrors[]="Erreur!!! Le login doit contenir au moins 4 caratères";
            }
        }

        if(isset($pwd1) && isset($pwd2)){
            if(empty($pwd1)){
                $validationErrors[]="Erreur!!! Le mot de passe ne doit pas être vide";
            }

            if(md5($pwd1)!==md5($pwd2)){
                $validationErrors[]="Erreur!!! Les deux mots de passe ne sont pas identiques";
            }
        }

        if(isset($email)){
            $filtreEmail=filter_var($email,FILTER_SANITIZE_EMAIL); 

            if($filtreEmail != true){
                $validationErrors[]="Erreur!!! Email non valide ";

            }
        }

        //verifier l'unicite du login et de l'email
        if(empty($validationErrors)){
            if(rechercher_par_login($login)==0 && rechercher_par_email($email)==0){
                $requete=$pdo->prepare("insert into utilisateur (login,email,pwd,role,etat) values (:plogin,:pemail,:ppwd,:prole,:petat)");
                $requete->execute(array('plogin' =>$login,
                                        'pemail' =>$email,
                                        'ppwd' =>md5($pwd1),
                                        'prole' =>'VISITEUR',
                                        'petat' =>0));

                $succes_msg="Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation de l'administrateur";
            }else{
                if(rechercher_par_login($login)>0){
                    $validationErrors[]='Désolé le login existe déjà';
                }
                if(rechercher_par_email($email)>0){
                    $validationErrors[]='Désolé cet email existe déjà';
                }
            }
            
        }
    }

?>

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Nouvel utilisateur</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel = "stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet"  href = "../css/monstyle.css " type="text/css">
		
    </head>

    <body>
              
        <div class="container col-md-6 offset-md-3">
            <h1 class="text-center">Création d'un nouveau compte utilisateur</h1>
            <form class="form" method="post" >
                <input type="text"
                    minlength="4"
                    title="Le login doit contenir au moins 4 caractères...."
                    name="login"
                    placeholder="Taper votre nom d'utilisateur"
                    autocomplete="off"
                    class="form-control"> <br>

                <input type="password"
                    minlength="3"
                    title="Le mot de passe doit contenir au moins 4 caractères...."
                    name="pwd1"
                    placeholder="Taper votre mot de passe"
                    autocomplete="off"
                    class="form-control"> <br>

                <input type="password"
                    minlength="3"
                    name="pwd2"
                    placeholder="Confirmer votre mot de passe"
                    autocomplete="new-password"
                    class="form-control"> <br>

                <input type="email"
                    name="email"
                    placeholder="Taper votre email"
                    autocomplete="off"
                    class="form-control"> <br>

                <input type="submit"
                    class="btn btn-primary" 
                    value="Enregistrer">
            </form>
                <br>
            <?php 
                //verifier si le tableau existe et est non vide 
                if(isset($validationErrors) && !empty($validationErrors)){ 

                    //parcourrir le tableau et afficher un msg d'erreur s'il existe
                    foreach ($validationErrors as $error){
                        echo '<div class="alert alert-danger"> '.$error .'</div> ' ;
                    }
                }
                
               if(!empty($succes_msg)) {   
                echo '<div class="alert alert-success"> '.$succes_msg .'</div> ' ;
                }
            ?> 

        </div> 
    </body>
</HTMl>
