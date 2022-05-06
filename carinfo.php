<?php
    require('database.php');
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    $prenom = $_SESSION['prenom'];

    if($_SESSION['ouvert'] == false){
        header("location: index.php");

    }

    if(isset($_POST['kilometrage'])){
      $identifiant = $_SESSION['identifiant'];
      $kilometrage = $_POST["kilometrage"];
      $objPdo->query("UPDATE cars SET kilometrage='" . $kilometrage . "' WHERE `identifiant` = '".$identifiant."'");
    }

    function viewCar(){
                  require('database.php');
                  $identifiant = $_SESSION['identifiant'];
                  $result = $objPdo->query("SELECT * FROM `cars` WHERE `identifiant` = '".$identifiant."'");
                  $row = $result->fetch();
                      while ($row = $result->fetch()) {
                          echo "<td>" . $row['marque'] . "</td>";
                          echo "<td>" . $row['modele'] . "</td>";
                          echo "<td>" . $row['plaque'] . "</td>";
                          echo "<td>" . $row['kilometrage'] . "</td>";
                        }
                }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/createaccount.css">
    <link rel="stylesheet" href="/css/carinfo.css">
    <title>MyCar - Ma voiture</title>
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
        <i class='bx bx-menu' style="color: #00ffd4" id="btn" ></i>
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
      <div class="text">Votre véhicule</div><br>
      <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Plaque</th>
                    <th scope="col">Kilométrage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    viewCar();
                ?>
            </tbody>
        </table>
        <a target="_top" href="/manuels/<?php echo $identifiant = $_SESSION['identifiant'];?>.pdf">Manuel d'utilisation de votre véhicule</a>        
    </div>
        <div class="container">
      <br>
        <form  method="post" class="my-form" action="carinfo.php" enctype="multipart/form-data">
          <input type="text" name="kilometrage" placeholder="Kilométrage"><br>
          <br>
          <input type="submit" value="Modifier le kilométrage">
<br><br>
<br><br>
<br><br>
          </form>
        </div>
              </div>
  </section>
    



  </body>
  
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

  
</html>