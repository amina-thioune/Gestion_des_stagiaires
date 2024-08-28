<?php 
        require_once("identifier.php");
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
        
        <div class="container" id="editPwd">
            <h1 class="text-center" > Changement de mot de passe</h1>
            <h2 class="text-center"> Compte : <?php echo $_SESSION['user']['login'] ?></h2>
            <form class="horizontale" method="post" action="updatePwd.php">
                <div class="input-container">    
                    <input type="password" 
                        id="input_password"
                        minlength="3"
                        class="form-control no-visible"  
                        autocomplete="false" 
                        name="oldpwd"
                        placeholder="Taper votre ancien mot de passe"
                        required>
                    <i class="glyphicon glyphicon-eye-open show-old-pwd" id="show_input_password" onclick="togglePasswordVisibility();"></i>
                </div>
                <br>
                <div class="input-container">    
                    <input type="password" 
                        id="confirm_password"
                        minlength="3"
                        class="form-control"  
                        autocomplete="false" 
                        name="newpwd"
                        placeholder="Taper votre nouveau mot de passe"
                        required>
                    <i class="glyphicon glyphicon-eye-open show-new-pwd" onclick="togglePasswordVisibilityConfirm();"></i>
                </div>
                <br>
                <input type="submit" 
                    type="submit"
                    value="Enregistrer"
                    class="btn btn-primary btn-block"/>  

            </form>
        </div>
    </body>
</HTMl>
