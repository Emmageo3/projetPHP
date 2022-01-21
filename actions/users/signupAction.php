<?php

    require ('actions/database.php');
    //validation du formulaire
    if(isset($_POST['validate'])){
        //verifier que tous les champs sont remplis
        if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

            //les donnees de l'utilisateur
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_lastname = htmlspecialchars($_POST['lastname']);
            $user_firstname = htmlspecialchars($_POST['firstname']);
            $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            //verifier si l'utilisateur existe déja
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
            $checkIfUserAlreadyExists->execute(array($user_pseudo));

            if($checkIfUserAlreadyExists->rowCount() == 0){

                //inserer l'utilisateur dans la base de données
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

                //recuperer les informations de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id FROM users WHERE nom = ?  AND prenom = ? AND pseudo = ?');
                $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

                $usersInfos = $getInfosOfThisUserReq->fetch();

                //authentifier l'utilisateur sur le site et recuperer ses donnees dans des variables globales
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //redirection vers la page d'accueil
                header('Location: index.php');

            }else{
                $errorMsg = "L'utilisateur existe déja !!!";
            }

        }else{
            $errorMsg = "Veuillez compléter tous les champs !!!";
        }
    }

?>