<?php

    require('actions/database.php');

     //validation du formulaire
     if(isset($_POST['validate'])){
        //verifier que tous les champs sont remplis
        if(!empty($_POST['pseudo']) AND  !empty($_POST['password'])){

            //les donnees de l'utilisateur
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_password = htmlspecialchars($_POST['password']);

            //verifier si l'utilisateur existe
            $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $checkIfUserExists->execute(array($user_pseudo));

            if($checkIfUserExists->rowCount() > 0){

                //Recuperer les donnees de l'utilisateur
                $usersInfos = $checkIfUserExists->fetch();

                //verifier si le mot de passe est correct
                if(password_verify($user_password, $usersInfos['mdp'])){
                    //authentifier l'utilisateur sur le site et recuperer ses donnees dans des variables globales
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $usersInfos['id'];
                    $_SESSION['lastname'] = $usersInfos['nom'];
                    $_SESSION['firstname'] = $usersInfos['prenom'];
                    $_SESSION['pseudo'] = $usersInfos['pseudo'];

                    //redirection vers la page d'accueil
                    header('Location: index.php');
                }else{
                    $errorMsg = "Votre mot de passe est incorrect !!!";
                }
            }else{
                $errorMsg = "Votre pseudo est incorrect !!!";
            }

        }else{
            $errorMsg = "Veuillez compléter tous les champs !!!";
        }
    }


?>