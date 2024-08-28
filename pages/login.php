<?php 

    session_start();
    if(isset($_SESSION['erreurLogin']))
        $erreurLogin=$_SESSION['erreurLogin'];
    else {
        $erreurLogin="";
    }

    $logindf=isset($_SESSION['user'])?$_SESSION['user']['login']:"";
    $pwddf=isset($_SESSION['user'])?$_SESSION['user']['pwd']:"";
    session_destroy();

?>

<!DOCTYPE HTML>
<HTMl>
<head>
        <meta charset="utf-8">
        <title>Se connecter</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel = "stylesheet"  href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet"  href = "../css/monstyle.css">
    </head>

    <body>
              
        <div class="container col-lg-4 offset-lg-4 col-md-6 offset-md-3">

            <div class="panel panel-primary margetop">
                 <div class="panel-heading"> Se connecter </div>
                    <div class="panel-body">
                        <form method="post" action="seConnecter.php" class="form">

                            <?php if(!empty($erreurLogin)) {   ?>
                                <div class="alert alert-danger">
                                    <?php  echo "$erreurLogin" ?>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label for="login"> Login :</label>
                                <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $logindf ?>"  >
                            </div> 

                            <div class="form-group">
                                <label for="prenom"> Mot de passe :</label>
                                <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" value="<?php echo $pwddf ?>">
                            </div> 

                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-log-in"> </span>
                                Se connecter
                            </button> <br> <br>
                            <a href="nouvelUtilisateur.php">Créer un compte </a> &nbsp; &nbsp;
                            <a href="initialiserPwd.php">Mot de passe oublié </a>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </body>
</HTMl>
