<?php 
    require "empleados.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud con htnl</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
            <input type="hidden" required name="txtID" value="<?php echo $txtID;?>" placeholder="" id="txtID" require="">

            <div class="form-group col-md-4">
            <label for="">Nombre(s):</label>
            <input type="text" class="form-control <?php echo (isset($error["Nombre"]))?"is-invalid":"";?>"  name="txtNombre" value="<?php echo $txtNombre;?>" placeholder="" id="txtNombre" require="">
            <div class="invalid-feedback">
            <?php echo (isset($error["Nombre"]))?$error["Nombre"]:""; ?>
            </div>

            <br>
            </div>
            <div class="form-group col-md-4">
            <label for="">Apellido Paterno:</label>
            <input type="text" class="form-control <?php echo (isset($error["ApellidoP"]))?"is-invalid":"";?>" name="txtApellidoP" value="<?php echo $txtApellidoP;?>" placeholder="" id="txtApellidoP" require="">
            <div class="invalid-feedback">
            <?php echo (isset($error["ApellidoP"]))?$error["ApellidoP"]:""; ?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-4">
            <label for="">Apellido Materno:</label>
            <input type="text" class="form-control <?php echo (isset($error["ApellidoM"]))?"is-invalid":"";?>" name="txtApellidoM" value="<?php echo $txtApellidoM;?>" placeholder="" id="txtApellidoM" require="">
            <div class="invalid-feedback">
            <?php echo (isset($error["ApellidoM"]))?$error["ApellidoM"]:""; ?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">Correo:</label>
            <input type="email" class="form-control <?php echo (isset($error["Correo"]))?"is-invalid":"";?>" name="txtCorreo" value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo" require="">
            <div class="invalid-feedback">
            <?php echo (isset($error["Correo"]))?$error["Correo"]:""; ?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">Foto:</label>

                <?php if($txtFoto!="") {?>
                <br/>
                <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../imagenes/<?php echo $txtFoto?>" />
                <br/>
                <br/>

                <?php } ?>

            <input type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto;?>" placeholder="" id="txtFoto" require="">
            <br>
            </div>
      </div>
      </div>
      <div class="modal-footer">
            <button value="btnAgregar"  <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
            <button value="btnModificar" <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
            <button value="btnElimninar" onclick="return Confirmar('¿Realmente deseas borrar?');" <?php  echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
            <button value="btnCancelar" <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Registro +
</button>
<br/>
<br/>         

        </form>
        <div class="row"> 
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php foreach($listaEmpleados as $empleado) { ?>
                    <tr>
                        <td> <img class="img-thumbnail" width="100px" src="../imagenes/<?php echo $empleado["Foto"];?>" /></td>
                        <td><?php echo $empleado["Nombre"];?> <?php echo $empleado["ApellidoP"];?> <?php echo $empleado["ApellidoM"];?> </td>
                        <td><?php echo $empleado["Correo"];?></td>
                        <td> 
                            <form action="" method="post">

                                    <input type="hidden" name="txtID" value="<?php echo $empleado["ID"];?>">
                                    <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                    <button value="btnElimninar" onclick="return Confirmar('¿Realmente deseas borrar?');" class="btn btn-danger" type="submit" name="accion">Eliminar</button>

                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php if($mostrarModal){?>
        <script>
            $("#exampleModal").modal("show");
        </script>
        <?php } ?>
        <script>
            function Confirmar(Mensaje){
                return (confirm(Mensaje))?true:false;
            }
        </script>
    </div>
</body>
</html>