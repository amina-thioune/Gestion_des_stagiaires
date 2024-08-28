<?php 
        require_once("identifier.php");
        require_once ('connexionbd.php');
         
        $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
        $requeteUser="select * from utilisateur where iduser=$idUser";
        $resultatUser=$pdo->query($requeteUser);
        $user=$resultatUser->fetch();

        $login=$user['login'];
        $email=$user['email'];
        $role=strtoupper($user['role']);

?> 

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet" href = "../css/monstyle.css">
    </head>

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container">

            <div class="panel panel-primary">
                 <div class="panel-heading">Edition de l'utilisateur </div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">

                        <div class="form-group">
                            <label for="niveau"> id de l'utilisateur:  <?php echo $idUser ?> </label> 
                            <input type="hidden" name="idUser" class="form-control" value="<?php echo $idUser ?>">
                        </div> 

                        <div class="form-group">
                            <label for="login"> Login :</label>
                            <input type="text" name="login" class="form-control" value="<?php echo $login ?>">
                        </div> 

                        <div class="form-group">
                            <label for="email"> Email :</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email ?>">
                        </div> 

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"> </span>
                            Enregistrer
                        </button>
                        &nbsp;
                        <a href="editerPwd.php">Changer le mot de passe</a>
                    </form>
                </div>
            </div>
            
        </div> 

        <?php include("footer.php") ; ?>

    </body>
</HTMl>
