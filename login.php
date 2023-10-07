<?php
include('connexionDB.php');
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
    header('Location: session.php');
}
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <style>
    form  {
    margin-left: 450px;
    padding: 100px;
    margin-top:10%;
    background-color: gray;
    border-radius: 12px;
    width:10%;
    height:85px;

    
    box-shadow: 5px 5px 5px 5px  rgb(244, 242, 242);

    }
    form .input{
        padding:10px;
        border-radius:20px;
        margin-left:-20%;
    }
    .submit{
        margin-left:7%;
        padding: 10px;
        background: red;
        border-radius:10px;
        width:100%;






    }
  </style>    

</head>
<body>
    
    <form action="" method="Post" >
        <input type="text" name="nom" class="input" placeholder="login" required> <br> <br>
        <input type="password" name="mdp" class="input" placeholder="password" required> <br> <br>
        <input type="submit" name="envoi" value="Entrer" class="submit">
    </form>
    </div>
    
</body>
</html>