<?php
include('db.php');
if(isset($_POST['save_task'])){
  $tipo_persona = $_POST['tipo_persona'];
  $nombre = $_POST['nombre'];
  $tipo_documento = $_POST['tipo_documento'];
  $num_documento = $_POST['num_documento'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $query = "INSERT INTO persona(tipo_persona, nombre, tipo_documento, num_documento, direccion, telefono, email) VALUES 
  (' $tipo_persona', '$nombre ', '$tipo_documento ', '$num_documento ', '$direccion', '$telefono ','$email ' )";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");

  }
 
  $_SESSION['message'] = 'persona registrada';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php'); 
}

?>
