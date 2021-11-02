<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="d-flex justify-content-between w-100">
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
          <label for="tipo_persona">TIPO PERSONA</label>
          <select name="tipo_persona" rows="2" class="form-control" placeholder="tipo persona">
              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
              <option value="ARRENDATARIO">ARRENDATARIO</option>
              <option value="VIGILANTE">VIGILANTE</option>
            </select>
          <div class="form-group">
          <label for="nombre">NOMBRE</label>
            <textarea name="nombre" rows="2" class="form-control" placeholder="nombre"></textarea>
          </div>
          <div class="form-group">
            <label for="tipo_documento">TIPO DE DOCUMENTO</label>
            <select name="tipo_documento" rows="2" class="form-control" placeholder="tipo documento">
              <option value="CC">CC</option>
              <option value="CE">CE</option>
              <option value="PASAPORTE">PASAPORTE</option>
            </select>  
          </div>
          <div class="form-group">
          <label for="num_documento">NUMERO DE DOCUMENTO</label>
            <textarea name="num_documento" rows="2" class="form-control" placeholder="numero documento"></textarea>
          </div>
          <div class="form-group">
          <label for="direccion">DIRECCION</label>
            <textarea name="direccion" rows="2" class="form-control" placeholder="Direccion"></textarea>
          </div>
          <div class="form-group">
          <label for="telefono">TELEFONO</label>
            <textarea name="telefono" rows="2" class="form-control" placeholder="telefono"></textarea>
          </div>
          <div class="form-group">
          <label for="email">EMAIL</label>
            <textarea name="email" rows="2" class="form-control" placeholder="Email"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    </div>
    <br>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tipo de Persona</th>
            <th>Nombre</th>
            <th>Tpo Documento</th>
            <th>Numero Docomento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM persona";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['tipo_persona']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['tipo_documento']; ?></td>
            <td><?php echo $row['num_documento']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
           <td><?php echo $row['telefono']; ?></td>
           <td><?php echo $row['email']; ?></td>



            <td>
              <a href="edit.php?idpersona=<?php echo $row['idpersona']?>" class="btn btn-secondary">
              <i class="fas fa-marker"></i>
              </a>
            
              <br>
              <a href="delete_task.php?idpersona=<?php echo $row['idpersona']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
    

<?php include('includes/footer.php'); ?>
