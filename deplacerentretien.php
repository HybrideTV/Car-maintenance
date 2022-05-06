<?php
    include 'database.php';
    session_start();

    $delete_stmt=$objPdo->prepare('INSERT INTO histoentretien(identifiant, tache, kilometrage, edate) SELECT identifiant, tache, kilometrage, edate FROM `entretien` WHERE id=?');
    $delete_stmt->bindValue(1, $_GET['id'], PDO::PARAM_INT);

    $delete_stmt2=$objPdo->prepare('DELETE FROM `entretien` WHERE id=?');
    $delete_stmt2->bindValue(1, $_GET['id'], PDO::PARAM_INT);

    $delete_stmt->execute(); 
    $delete_stmt2->execute(); 


    header('location:entretien.php');

?>