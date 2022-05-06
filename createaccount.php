<?php

    require('database.php');

    if(isset($_POST['mdp']) && isset($_POST['prenom']) && isset($_POST['nom']) 
    && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['plaque']) && isset($_POST['kilometrage'])){
      $identifiant = rand(400000, 500000);
    
      $email= $_POST["email"];
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];

      $mdp = $_POST["mdp"];
      $hash = password_hash($mdp,PASSWORD_BCRYPT,['cost' => 14]) ;

      $marque = $_POST["marque"];
      $edate = $_POST["edate"];

      $modele = $_POST["modele"];
      $plaque = $_POST["plaque"];
      $kilometrage = $_POST["kilometrage"];

      $req = $objPdo->prepare('INSERT INTO account(identifiant, mdp, nom, prenom, email) VALUES (?, ?, ?, ?, ?)');
      $req2 = $objPdo->prepare('INSERT INTO cars(identifiant, marque, modele, plaque, kilometrage) VALUES (?, ?, ?, ?, ?)');
      $req3 = $objPdo->prepare('INSERT INTO cars(identifiant, marque, modele, plaque, kilometrage) VALUES (?, ?, ?, ?, ?)');
      $req4 = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
      $req5 = $objPdo->prepare('INSERT INTO histoentretien(id, identifiant, tache, kilometrage) VALUES (?, ?, ?, ?)');

      $req->execute(array($identifiant, $hash, $nom, $prenom, $email));
      $req3->execute(array($identifiant, 0, 0, 0, 0));
      $req2->execute(array($identifiant, $marque, $modele, $plaque, $kilometrage));
      $req4->execute(array($identifiant, 0, 0, 0));
      $req5->execute(array($identifiant, 0, 0, 0));

      echo "Votre identifiant : $identifiant " ;
      echo "Pensez à le sauvegarder !";

      $addYear = date('Y-m-d', strtotime($edate. ' + 1 year'));
      $add2Year = date('Y-m-d', strtotime($edate. ' + 2 years'));
      $add3Year = date('Y-m-d', strtotime($edate. ' + 3 years'));
      $add4Year = date('Y-m-d', strtotime($edate. ' + 4 years'));
      $add5Year = date('Y-m-d', strtotime($edate. ' + 5 years'));
      $add6Year = date('Y-m-d', strtotime($edate. ' + 6 years'));
      $add7Year = date('Y-m-d', strtotime($edate. ' + 7 years'));
      $add8Year = date('Y-m-d', strtotime($edate. ' + 8 years'));
      $add9Year = date('Y-m-d', strtotime($edate. ' + 9 years'));
      $add10Year = date('Y-m-d', strtotime($edate. ' + 10 years'));

      // COPIE DES MANUELS
      if(isset($_POST['modele'])){
        $selected = $_POST['modele'];
        if($selected = "Clio IV"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Révision", 10000, $addYear));
          $reqAdd->execute(array($identifiant, "Révision", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Révision", 30000, $add3Year));
          $reqAdd->execute(array($identifiant, "Révision", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Révision", 50000, $add5Year));
          $reqAdd->execute(array($identifiant, "Révision", 60000, $add6Year));
          $reqAdd->execute(array($identifiant, "Révision", 70000, $add7Year));
          $reqAdd->execute(array($identifiant, "Révision", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Révision", 90000, $add9Year));
          $reqAdd->execute(array($identifiant, "Vidange", 10000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 50000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 70000, $add7Year));
          $reqAdd->execute(array($identifiant, "Vidange", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add9Year ));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 40000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 60000,  $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 80000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Contrôle et dépoussiérage garnitures frein à tambour", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 80000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 80000, $add3Year));

          $file = "manuels/clio4.pdf";
          $newfile = "manuels/$identifiant.pdf";
          if(!copy($file, $newfile)){
            echo "Erreur lors de la copie du manuel";
          }
        }else if($selected = "Clio V"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Révision", 10000, $addYear));
          $reqAdd->execute(array($identifiant, "Révision", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Révision", 30000, $add3Year));
          $reqAdd->execute(array($identifiant, "Révision", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Révision", 50000, $add5Year));
          $reqAdd->execute(array($identifiant, "Révision", 60000, $add6Year));
          $reqAdd->execute(array($identifiant, "Révision", 70000, $add7Year));
          $reqAdd->execute(array($identifiant, "Révision", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Révision", 90000, $add9Year));
          $reqAdd->execute(array($identifiant, "Vidange", 10000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 50000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 70000, $add7Year));
          $reqAdd->execute(array($identifiant, "Vidange", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add9Year ));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 20000, $add2Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 40000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 60000,  $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre a air", 80000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Contrôle et dépoussiérage garnitures frein à tambour", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 80000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 80000, $add3Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 80000, $add4Year));
          $file = "/manuels/clio5.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "Captur"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Révision", 30000, $addYear));
          $reqAdd->execute(array($identifiant, "Révision", 60000, $add2Year));
          $reqAdd->execute(array($identifiant, "Révision", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Révision", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Révision", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Révision", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre à carburant", 30000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre à carburant", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Contrôle et dépoussiérage garnitures frein à tambour", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 90000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 80000, $add4Year));
          $file = "/manuels/captur.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "Zoe"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Révision ZE A", 30000, $addYear));
          $reqAdd->execute(array($identifiant, "Révision ZE A et B", 60000, $add2Year));
          $reqAdd->execute(array($identifiant, "Révision ZE A et B ", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Contrôle et dépoussiérage garnitures frein a tambour", 90000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre habitacle", 60000, $add2Year));
          $reqAdd->execute(array($identifiant, "Remplacement filtre habitacle", 90000, $add3Year));
          
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 150000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement batterie 12v", 90000, $add3Year));
          $reqAdd->execute(array($identifiant, "Contrôle et mise à niveau fluide réfrigérant", 150000, $add6Year));
          $file = "/manuels/zoe.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "Twingo"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air", 20000, $addYear));
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air + Filtre habitacle", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air", 60000, $add3Year));
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air + filtre habitacle", 80000, $add4Year));
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air", 100000, $add5Year));
          $reqAdd->execute(array($identifiant, "Révision + remplacement filtre à air + filtre habitacle", 120000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 15000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 45000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 75000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 115000, $add7Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets + bougies d allumage", 120000, $add4Year));
          $reqAdd->execute(array($identifiant, "Contrôle et dépoussiérage garnitures frein à tambour", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 60000, $add5Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 120000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 120000, $add3Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Nettoyage et contrôle système air conditionné", 80000, $add4Year));
          $file = "/manuels/twingo.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }

        else if($selected = "AMI"){
          $file = "/manuels/ami.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "C4"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Vidange", 15000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 45000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 75000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 115000, $add7Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 200000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 180000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage + filtre à air", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage + filtre à air", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 40000, $add2Year));
          $file = "/manuels/c4.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "C3"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Vidange", 15000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange", 30000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 45000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 75000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange", 90000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 115000, $add7Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 200000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 180000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage + filtre à air", 80000, $add8Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage + filtre à air", 40000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 40000, $add2Year));
          $file = "/manuels/c3.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "ECOSPORT"){
          require('database.php');
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Vidange", 15000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à carburant + filtre à huile", 30000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 45000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à carburant + filtre à huile", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 75000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à carburant + filtre à huile", 90000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 115000, $add7Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 150000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 180000, $add9Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 120000, $add8Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 80000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 120000, $add6Year));
          $file = "/manuels/ecosport.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }else if($selected = "FIESTA"){
          $reqAdd = $objPdo->prepare('INSERT INTO entretien(identifiant, tache, kilometrage, edate) VALUES (?, ?, ?, ?)');
          $reqAdd->execute(array($identifiant, "Vidange", 15000, $addYear));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à huile", 30000, $add2Year));
          $reqAdd->execute(array($identifiant, "Vidange", 45000, $add3Year));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à huile", 60000, $add4Year));
          $reqAdd->execute(array($identifiant, "Vidange", 75000, $add5Year));
          $reqAdd->execute(array($identifiant, "Vidange + remplacement filtre à air + filtre à huile", 90000, $add6Year));
          $reqAdd->execute(array($identifiant, "Vidange", 115000, $add7Year));
          $reqAdd->execute(array($identifiant, "Remplacement courroires et galets", 180000, $add10Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de refroidissement", 180000, $add9Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 120000, $add6Year));
          $reqAdd->execute(array($identifiant, "Remplacement bougies d allumage", 60000, $add3Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 40000, $add2Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 80000, $add4Year));
          $reqAdd->execute(array($identifiant, "Remplacement liquide de frein", 120000, $add6Year));
          $file = "/manuels/fiesta.pdf";
        $newfile = "/manuels/$identifiant.pdf";
        if(!copy($file, $newfile)){
          echo "Erreur lors de la copie du manuel";
        }
        }
      }

      //ENVOI EMAIL

      $from ="no-reply@studycorp.fr";
      $to= $_POST["email"];
      $subject="MyCar | Création de votre compte";
      $message ="Bonjour $nom $prenom ! \n
      Voici votre identifiant de connexion pour l'espace client : $identifiant Pensez à le sauvegarder ! \n
      Le carnet d'entretien à été automatiquement généré selon les préconisation constructeur disponible en ligne. Si celui-ci n'est pas complet vis-à-vis de votre véhicule, vous pouvez rajouter des entretiens à effectuer !\n
      A bientôt !";

      $headers ="from: " . $from;
      mail($to, $subject, $message, $headers);
  }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/css/inscription.css">
    <link rel="stylesheet" href="/css/createaccount.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      </head>
      <body style="background: linear-gradient(140deg, rgb(26, 27, 26), rgb(87, 86, 85)); color:white">        <!-- SLIDER IMAGE ICI -->
    <div class="container">
      <br>
        <form  method="post" class="my-form" action="createaccount.php" enctype="multipart/form-data">
          <h1>Vos informations</h1>
          <input type="text" name="nom" placeholder="Nom" required><br><br>
          <input type="text" name="prenom" placeholder="Prénom" required><br><br>
          <input type="text" name="email" placeholder="Adresse mail" required><br><br>
          <input type="text" name="mdp" placeholder="Mot de passe" required><br><br>

          <br>
          <hr>
          <br>
          <h1>Information de votre véhicule</h1>
          <select name="marque" id="marque">
              <option value="Renault">Renault</option>
              <option value="Citroen">Citroen</option>
              <option value="Ford">Ford</option>
          </select>
    <br><br>
    <select name="modele" id="modele">
              <option value="Clio IV">Clio IV (Renault)</option>
              <option value="Clio V">Clio V (Renault)</option>
              <option value="Captur">Captur (Renault)</option>
              <option value="Zoe">Zoe (Renault)</option>
              <option value="Twingo">Twingo (Renault)</option>
              <option>----------</option>
              <option value="C3">C3 (Citroen)</option>
              <option value="C4">C4 (Citroen)</option>
              <option value="AMI">AMI (Citroen)</option>
              <option>----------</option>
              <option value="FIESTA">Fiesta (Ford)</option>
              <option value="ECOSPORT">EcoSport (Ford)</option>
          </select>
    <br><br>
    <p>Date de première immatriculations</p>
    <input type="date" name="edate" placeholder="Date de première immatriculation (AAAA-MM-DD)"><br><br>
          <input type="text" name="plaque" placeholder="Plaque" required><br><br>
          <input type="text" name="kilometrage" placeholder="Kilométrage actuel" required><br><br>
          

          <input type="submit" value="Créer mon compte">      
          </form>
        </div>
  </body>
</html>