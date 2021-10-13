<?php include_once("encabezado.php"); ?>
        <h1 class="text-center">Artículos más vendidos</h1>
        <div class="card p-4 bg-light">
          <?php
            $ren = 0;
            for ($i=0; $i < count($Datos["data"]); $i++) { 
              if ($ren==0) {
                print "<div class='row'>";
              }
              print "<div class='card pt-2 col-sm-3'>";
              print "<img src='public/img/".$Datos['data'][$i]["imagen"]."' ";
              print "class='img-responsive' style='width:100%; height:140px;' ";
              print "alt='".$Datos['data'][$i]["nombre"]."'/>";
              print "<p><a href='".URL."admonProductos/producto/";
              print $Datos['data'][$i]["id"]."'>";
              print $Datos['data'][$i]["nombre"]."</a></p>";
              print "</div>";
              $ren++;
              if ($ren==4) {
                $ren = 0;
                print "</div>";
              }
            }
            print "<br>";
            print '<h1 class="text-center">Artículos nuevos</h1>';
            print '<div class="card p-4 bg-light">';
            $ren = 0;
            for ($i=0; $i < count($datos["nuevos"]); $i++) { 
              if ($ren==0) {
                print "<div class='row'>";
              }
              print "<div class='card pt-2 col-sm-3'>";
              print "<img src='public/img/".$datos['nuevos'][$i]["imagen"]."' ";
              print "class='img-responsive' style='width:100%; height:140px;' ";
              print "alt='".$Datos['nuevos'][$i]["nombre"]."'/>";
              print "<p><a href='".URL."admonProductos/producto/";
              print $Datos['nuevos'][$i]["id"]."'>";
              print $Datos['nuevos'][$i]["nombre"]."</a></p>";
              print "</div>";
              $ren++;
              if ($ren==4) {
                $ren = 0;
                print "</div>";
              }
            }
          ?>
        </div><!--card-->
<?php include_once("piepagina.php"); ?>
