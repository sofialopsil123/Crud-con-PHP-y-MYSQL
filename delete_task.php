<?php

include("db.php");

if(isset($_GET['idpersona'])) {
  $idpersona = $_GET['idpersona'];
  $query = "DELETE FROM persona WHERE idpersona = $idpersona";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
