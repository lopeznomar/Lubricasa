<?php
function LoadArts($email,$clave)
{ $server    ="localhost";
  $usuario   ="root";
  $contraseña="";
  $bd        ="Productos";
  $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("Error en la conexión:".mysqli_connect_error());
  $resultado =mysqli_query($conexion,"select * from cliente where sha1('$clave')=clave") or die ("Error al consultar: ".mysqli_error($conexion));
  $rows = mysqli_num_rows($resultado);
  mysqli_free_result($resultado);
  $Rslt=array();
  if( $rows>0)
    { $RS =mysqli_query($conexion,"select * from articulo") or die ("Error al consultar: ".mysqli_error($conexion));
      $rows = mysqli_num_rows($RS);
      if( $rows>0)
        { while( $row=mysqli_fetch_array($RS,MYSQLI_BOTH))
            { array_push($Rslt,$row);
              }
          mysqli_free_result($RS);
        }
    }
  return $Rslt;
}

/*echo "En el LoadProd";
if( isset($_POST['Email']) && isset($_POST['Clave']) && isset($_POST['OutSide']))
  { $Articulos=LoadArts($_POST['Email']),$_POST['Clave']);
    var_dump($Articulos);
  }*/
?>
