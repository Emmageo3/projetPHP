<?php

    require ('actions/database.php');

    if(isset($_POST['validate'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

        }else{
            $errorMsg = "Veuillez compléter tous les champs !!!";
        }
    }

?>