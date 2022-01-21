<?php
//connexion a la base de données
try{
    session_start();
    $bdd = new PDO ('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
?>