<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Borrar un usuario administrativo</h1>
<div class="card p-4 bg-light">
  <form action="<?php print URL; ?>admonUsuarios/baja/" method="POST">
    <div class="form-group text-left">
      <label for="correo">Usuario:</label>
      <input type="email" name="correo" class="form-control" disabled
      placeholder="Digita tu usuario o tu correo electrónico"
      value="<?php 
      print isset($datos['data']['correo'])?$datos['data']['correo']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" class="form-control"
      placeholder="Escribe tu Nombre" disabled
      value="<?php 
      print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
      ?>"
      >
    </div>

    <div class="form-group">
      <label for="status">Selecciona un status</label>
      <select class="form-control" name="status" id="status" disabled>
        <option value="void">Selecciona el status del usuario</option>
        <?php
        for ($i=0; $i < count($datos["status"]); $i++) { 
          print "<option value='".$datos["status"][$i]["indice"]."'";
          if($datos["status"][$i]["indice"]==$datos["data"]["status"]){
            print " selected ";
          }
          print ">".$datos["status"][$i]["cadena"]."</option>";
        }
        ?>
      </select>

    </div>

    <div class="form-group text-left">
      <input type="hidden" id="id" name="id" value="<?php print $datos['data']['id']; ?>"/>
      <input type="submit" value="Si" class="btn btn-danger">
      <a href="<?php print URL; ?>admonUsuarios" class="btn btn-danger">No</a>
      <p>Una vez que los datos son borrados, no se puede recuperar.</p>
    </div>
  </form>
</div><!--card-->
<?php include_once("piepagina.php"); ?>
