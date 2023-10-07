<?php
session_start();
include("connexionDB.php");
//insérer les donnée du formulaire dans la base de donnéé

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom']) AND !empty($_POST['mdp'])){
        $nom=$_POST['nom'];
        $mdp=$_POST['mdp'];
        $requete =$conn->prepare("INSERT INTO conns VALUES(0, :nom, :mdp)");
        $requete->execute(
        array(
        ":nom" => $nom,
        ":mdp" => $mdp
        )
    );

        if($requete->rowCount() > 0){
            $_SESSION['nom'] = $nom;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] =$requete->fetch()['id'];
            header ('Location: logout.php');
        }else{
            echo "votre mot de passe est incorrect";
        }
      
        }
    else{
        echo " veuillez completez tous les champs";
    }
    
 
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
    <form action=""method="POST">
        <input type="text" name="nom" id="" placeholder="login"> <br> <br>
        <input type="password" name="mdp" id="" placeholder="mdp"> <br> <br>
        <input type="submit" name="envoi" id=""  class="btn" >
    </form>
    </div>
</body>
</html>