<?php 
include("connexionDB.php");

if(isset($_POST['envoi'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $mail=$_POST['mail'];
        $mdp=$_POST['mdp'];
        $confirmation_mdp =$_POST['confirmation_mdp'];

    // Vérifiez si les mots de passe correspondent
    if ($mdp === $confirmation_mdp) {
        
        $requete = $conn->prepare("INSERT INTO inscription (nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)");
        $requete->execute( 
            array( 
            ":nom"=>$nom,
            ":prenom"=>$prenom,
            ":mail"=> $mail, 
            ":mdp"=>$mdp
            )
        
        );
        header('Location: session.php');
      
        }
        else{
            echo"les mot de pass ne se correspond pas";
        }
}
   
    
 




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style="background-color:gray;">
    <a href="session.php" class="form-control me-2">Accueil</a>

    
    <form method="POST" style="margin-left:30%; margin-top:10%;">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" name="nom" class="form-control"  placeholder="nom" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" name="prenom"class="form-control"  placeholder="prenom" required>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Mail</label>
    <input type="email" name="mail" class="form-control" id="inputAddress" placeholder="mail" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">password</label>
    <input type="password" name="mdp" class="form-control" id="inputAddress2" placeholder="password" required>
  </div>
  <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="inputCity">Confirm_password</label>
      <input type="password" name="confirmation_mdp" class="form-control" required>
    </div>
 </div> <br>
<input type="submit" class="btn btn-primary" name="envoi" value="inscription">
</form>

    
    
</body>
</html>