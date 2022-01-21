<?php

    require ('actions/database.php');

    if(isset($_POST['validate'])){
        if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        }else{
            $errorMsg = "Veuillez compléter tous les champs !!!";
        }
    }

?>