<?php


require'../connexion.php';



if(isset($_POST['username1'],$_POST['password1'])){
    if(empty($_POST['username1'])){
        echo "Le champ Pseudo est vide.";
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['username1'])){
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['username1'])>25){
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['password1'])){
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($db,"SELECT * FROM user WHERE username='".$_POST['username1']."'"))==1){
        echo "Ce pseudo est déjà utilisé.";
    } else {
        if(!mysqli_query($db,"INSERT INTO user SET username='".$_POST['username1']."', password='".md5($_POST['password1'])."'")){
            echo "Une erreur s'est produite: ".mysqli_error($db);
        } else {
            echo "Vous êtes inscrit avec succès!";


        }
    }
}