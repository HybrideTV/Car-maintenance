<?php

    require('database.php');

    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    if($_SESSION['ouvert'] == false){
        header("location: index.php");
    }


    if(isset($_POST['tache']) && isset($_POST['kilometrage']) && isset($_POST['edate'])){
      $tache = $_POST["tache"];
      $kilometrage = $_POST["kilometrage"];
      $edate = $_POST["edate"];
      $identifiant = $_SESSION['identifiant'];

      $req = $objPdo->prepare('INSERT INTO entretien(tache, kilometrage, identifiant, edate) VALUES (?, ?, ?, ?)');

      $req->execute(array($tache, $kilometrage, $identifiant, $edate));
    }

function viewEntretien(){
                  require('database.php');
                  $identifiant = $_SESSION['identifiant'];
                  $i = 1;
                  $result = $objPdo->query("SELECT * FROM `entretien` WHERE `identifiant` = '".$identifiant."' ORDER BY edate");
                  $row = $result->fetch();
                      while ($row = $result->fetch()) {
                          echo "<td>" . $row['tache'] . "</td>";
                          echo "<td>" . $row['kilometrage'] . "</td>";
                          echo "<td>" . $row['edate'] . "</td>";
                          echo "<td>"; echo '<a href="deplacerentretien.php?id='.$row['id'] .'" > Effectué ? </a>'; echo "</td>";
                          echo "</tr>";
                          $i++;
                        }
                }
function viewHistoentretien(){
                  require('database.php');
                  $identifiant = $_SESSION['identifiant'];
                  $i = 1;
                  $result = $objPdo->query("SELECT * FROM `histoentretien` WHERE `identifiant` = '".$identifiant."' ORDER BY edate");
                  $row = $result->fetch();
                      while ($row = $result->fetch()) {
                          echo "<td>" . $row['tache'] . "</td>";
                          echo "<td>" . $row['kilometrage'] . "</td>";
                          echo "<td>" . $row['edate'] . "</td>";
                          echo "</tr>";
                          $i++;
                        }
                }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/createaccount.css">
    <link rel="stylesheet" href="/css/carinfo.css">
    <title>MyCar - Mon entretien</title>
    <link rel="icon" href="/resources/logo.png"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body style="background-color: #E4E9F7">
     <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-car icon' style="color: #00ffd4"></i>
        <div class="logo_name">MyCar</div>
        <i class='bx bx-menu' id="btn" style="color: #00ffd4"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="carinfo.php">
          <i class='bx bx-car'></i>
          <span class="links_name">Votre véhicule</span>
        </a>
         <span class="tooltip">Votre véhicule</span>
      </li>
      <li>
       <a href="entretien.php">
         <i class='bx bx-wrench' ></i>
         <span class="links_name">Entretien</span>
       </a>
       <span class="tooltip">Entretien</span>
     </li>
     <li>
       <a href="deconnexion.php">
         <i class='bx bx-log-in' style="color: #ff8080"></i>
         <span class="links_name">Se déconnecter</span>
       </a>
       <span class="tooltip">Se déconnecter</span>
     </li>
    </ul>
  </div>

  <section class="home-section">
  <div class="projet-box">
    
  <div class="text">Entretiens à effectuer</div><br>
  <hr>
    <p>Les entretiens doivent être éffectués au premier des 2 termes atteins (Kilométrage/Date)</p>
    <hr>
  <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tache</th>
                    <th scope="col">Kilométrage</th>
                    <th scope="col">Date</th>


                </tr>
            </thead>
            <tbody>
                <?php
                    viewEntretien();
                ?>
            </tbody>
        </table>
    </div>
    <br><hr>
    <div class="text">Historique des entretiens</div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tache</th>
                    <th scope="col">Kilométrage</th>
                    <th scope="col">Date</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    viewHistoentretien();
                ?>
            </tbody>
        </table>
    </div>
    <br><hr>
    <div class="text">Ajouter un entretien à éffectuer</div>

  <form  method="post" class="my-form" action="entretien.php" enctype="multipart/form-data">
          <!--<input type="text" name="modele" placeholder="Modèle"><br>-->
          <input type="text" name="tache" placeholder="Tache"><br>
          <input type="text" name="kilometrage" placeholder="Kilométrage"><br>
          <input type="date" name="edate" placeholder="Date (AAAA-MM-DD)"><br>
          <br>
          <input type="submit" value="Ajouter un entretien">
          </form>
          <br><br><hr>
</div>
  </section>

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
