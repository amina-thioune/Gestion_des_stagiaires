<?php 
    require_once("identifier.php");
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top ">
  <!-- Brand -->
  <a class="navbar-brand" href="../index.php">Gestion des stagiaires</a>

  <!-- Links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="filieres.php"><i class="glyphicon glyphicon-tags"></i> Les filieres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stagiaires.php"><i class="glyphicon glyphicon-list-alt"></i> Les stagiaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="utilisateurs.php"><i class="glyphicon glyphicon-user"></i> Les utilisateurs</a>
      </li>
  </ul>

  <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="editerUtilisateur.php?idUser=<?php echo $_SESSION['user']['iduser'] ?>"><i class="glyphicon glyphicon-user"></i><?php echo ' '.$_SESSION['user']['login'] ?></a>
      </li>&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="seDeconnecter.php"><i class="glyphicon glyphicon-log-out"></i> Se deconnecter</a>
      </li>
  </ul>
  
        
</nav>
<!--la balise marque permet de faire une barre de défilement d'une phrase
<h1><marquee>Ce site permet une meilleur gestion des stagiaires de l'entreprise Amina. Ils pourront à
   travers ce site consulter des informations les concernant.
</marquee></h1> -->