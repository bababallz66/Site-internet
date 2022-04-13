<?php
session_start();
require_once "core/database.php";
    if  (isset($_SESSION['email'])) {
    echo '<a href="Profil.php" style="color:#FF0000;">Profil  </a>';

} else{
    
}
   echo '<a href="index.php" style="color:#FF0000;">Accueil  </a>';
   echo '<a href="login.php" style="color:#FF0000;">Connexion  </a>';
   echo '<a href="inscription.php" style="color:#FF0000;">Inscription</a>';
?>