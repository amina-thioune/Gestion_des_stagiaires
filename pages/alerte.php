<?php 
    require_once("identifier.php");
    $message=isset($_GET['message'])?($_GET['message']):"Erreur";
?>

<!DOCTYPE HTML>
<HTMl>
    <head>
        <meta charset="utf-8">
        <title>Alerte</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel = "stylesheet" href = "../css/bootstrap/css/bootstrap.css">
		<link rel = "stylesheet" href = "../css/monstyle.css">
    </head>

    <body>
        <?php include("menu.php") ; ?>
       
        <div class="container">
            <div class="panel panel-danger margetop">
                 <div class="panel-heading"><h4> Erreur: </h4></div>
                <div class="panel-body">
                    <h3><?php  echo $message ?></h3>
                    <h4><a href="<?php  echo $_SERVER['HTTP_REFERER'] ?>">Retour >>>></a></h4>
                </div>
            </div>  

        </div> 

        <?php include("footer.php") ; ?>

    </body>
</HTMl>
