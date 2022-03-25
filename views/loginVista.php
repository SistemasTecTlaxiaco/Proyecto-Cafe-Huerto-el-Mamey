<?php include_once("encabezado.php"); ?>
        <h1 class="text-center">Login</h1>
        <div class="card p-4 bg-light">
  <form action="<?php print URL; ?>login/verifica/" method="POST">
    <div class="form-group text-left">
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" class="form-control"
      placeholder="Escribe tu usuario (tu correo electrónico)"
      value="<?php 
      print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <label for="clave">Clave acceso:</label>
      <input type="password" name="clave" class="form-control" maxlength="8"
      placeholder="Escribe tu clave de acceso (sin espacios en blanco, máximo 8 caracteres)"
      value="<?php 
      print isset($datos['data']['clave'])?$datos['data']['clave']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <input type="submit" value="Enviar" class="btn btn-success">
    </div>
    <input type="checkbox" name="recordar" 
    <?php
      if(isset($datos['data']['recordar'])){
        if($datos['data']['recordar']=="on") print "checked";
      }
    ?>>
      <label for="recordar">Recordar</label>
  </form>
</div><!--card-->
  <a href="<?php print URL; ?>login/registro/" >Darse de alta en el sistema</a><br>
  <a href="<?php print URL; ?>login/olvido/">¿Olvidaste tu clave de acceso?</a>
<?php include_once("piepagina.php"); ?>