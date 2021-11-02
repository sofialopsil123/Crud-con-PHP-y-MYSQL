<?php
include("db.php");
$tipo_persona = '';
$nombre = '' ;
$tipo_documento = '' ;
$num_documento = '';
$direccion = '';
$telefono = '' ;
$email = '';

if  (isset($_GET['idpersona'])) {
  $idpersona = $_GET['idpersona'];
  $query = "SELECT * FROM persona WHERE idpersona=$idpersona";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tipo_persona = $row['tipo_persona']; 
    $nombre = $row['nombre']; 
    $tipo_documento = $row['tipo_documento']; 
    $num_documento = $row['num_documento']; 
    $direccion =  $row['direccion']; 
    $telefono = $row['telefono']; 
    $email = $row['email']; 
  }
}

if (isset($_POST['update'])) {
  $idpersona = $_GET['idpersona'];
  $tipo_persona = $_POST['tipo_persona']; 
  $nombre = $_POST['nombre']; 
  $tipo_documento = $_POST['tipo_documento']; 
  $num_documento = $_POST['num_documento']; 
  $direccion =  $_POST['direccion']; 
  $telefono = $_POST['telefono']; 
  $email = $_POST['email']; 

  $query = "UPDATE persona set tipo_persona = '$tipo_persona', nombre = '$nombre',tipo_documento = '$tipo_documento',num_documento = '$num_documento',direccion = '$direccion',telefono = '$telefono',email = '$email' WHERE idpersona=$idpersona";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?idpersona=<?php echo $_GET['idpersona']; ?>" method="POST">
      <div class="form-group">
      <label for="tipo_persona">TIPO PERSONA</label>
      <select name="tipo_persona" rows="2" class="form-control" value="<?php echo $tipo_persona; ?>" placeholder="tipo persona">
              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
              <option value="ARRENDATARIO">ARRENDATARIO</option>
              <option value="VIGILANTE">VIGILANTE</option>
            </select>
          <div class="form-group">
          <label for="nombre">NOMBRE</label>
            <textarea name="nombre" rows="2" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre"></textarea>
          </div>
          <div class="form-group">
            <label for="tipo_documento">TIPO DE DOCUMENTO</label>
            <select name="tipo_documento" rows="2" class="form-control" value="<?php echo $tipo_documento; ?>" placeholder="tipo documento">
              <option value="CC">CC</option>
              <option value="CE">CE</option>
              <option value="PASAPORTE">PASAPORTE</option>
            </select>  
          </div>
          <div class="form-group">
          <label for="num_documento">NUMERO DE DOCUMENTO</label>
            <textarea name="num_documento" rows="2" class="form-control" value="<?php echo $num_documento; ?>" placeholder="numero documento"></textarea>
          </div>
          <div class="form-group">
          <label for="direccion">DIRECCION</label>
            <textarea name="direccion" rows="2" class="form-control" value="<?php echo $direccion; ?>" placeholder="Direccion"></textarea>
          </div>
          <div class="form-group">
          <label for="telefono">TELEFONO</label>
            <textarea name="telefono" rows="2" class="form-control" value="<?php echo $telefono; ?>" placeholder="telefono"></textarea>
          </div>
          <div class="form-group">
          <label for="email">EMAIL</label>
            <textarea name="email" rows="2" class="form-control" value="<?php echo $email; ?>" placeholder="Email"></textarea>
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>