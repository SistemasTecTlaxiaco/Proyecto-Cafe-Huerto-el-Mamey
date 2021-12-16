<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Alta de un usuario Administrativo</h1>
<div class="card p-4 bg-light">
  <form action="<?php print URL; ?>admonUsuarios/alta/" method="POST">
    <div class="form-group text-left">
      <label for="usuario">* Usuario:</label>
      <input type="email" name="usuario" class="form-control" required
      placeholder="Escribe tu usuario o tu correo electrónico"
      value="<?php 
      print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <label for="clave1">* Clave acceso:</label>
      <input type="password" name="clave1" class="form-control" required
      placeholder="Escribe tu clave de acceso (sin espacios en blanco)"
      value="<?php 
      print isset($datos['data']['clave1'])?$datos['data']['clave1']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <label for="clave2">* Verifica la clave acceso:</label>
      <input type="password" name="clave2" class="form-control" required
      placeholder="Verifica la clave de acceso (sin espacios en blanco)"
      value="<?php 
      print isset($datos['data']['clave2'])?$datos['data']['clave2']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="nombre">* Nombre:</label>
      <input type="text" name="nombre" class="form-control"
      placeholder="Escribe tu Nombre" required
      value="<?php 
      print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <input type="submit" value="Enviar" class="btn btn-success">
      <a href="<?php print URL; ?>admonUsuarios" class="btn btn-info">Regresar</a>
    </div>
  </form>
</div><!--card-->
<?php include_once("piepagina.php"); ?>