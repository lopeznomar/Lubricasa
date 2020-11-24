<!DOCTYPE>
<html>
 <head>
  <title>Registrar</title>
 </head>
 <script>
  function redirectPost(url, data)
  { var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for(var name in data)
      { var input  = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value= data[name];
        form.appendChild(input);
      }
  form.submit();
}
 </script>
 <body>
    <?php
        $server    ="localhost";
        $usuario   ="root";
        $contraseña="";
        $bd        ="Productos";

        if( isset($_GET['Email']) && isset($_GET['Clave']) && isset($_GET['Nombre']))
          { $email = $_GET['Email'];
            $clave = $_GET['Clave'];
            $nombre =$_GET['Nombre'];
            $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("Error en la conexión:".mysqli_connect_error());
            $insertar = "INSERT into cliente(correo, clave, nombre, fecreg) values ('$email',sha1('$clave'), '$nombre', CURDATE())";
            $resultado = mysqli_query($conexion, $insertar) or die ("Error al insertar los registros: ".mysqli_error($conexion));
            mysqli_commit($conexion);
            mysqli_close($conexion);
            echo "<script>alert('Datos insertados correctamente');</script>";
            echo "<script>redirectPost('http://localhost/Productos.php', { Email:'$email',Clave:'$clave',Nombre:'$nombre'});</script>";
          }
        else
          {
    ?>
          <form action="Registro.php" method="GET">
          <label for="Nombre">Ingrese su nombre</label><br>
          <input type="text" name="Nombre" required>
          <br><br>
          <label for="correo">Ingrese su email</label>
          <br>
          <input type="text" name="Email" placeholder="correo" required>
          <br><br>
          <label for="clave">Ingrese su clave</label>
          <br>
          <input type="password" name="Clave" required>
          <br><br>
          <button type="submit">Entrar</button>

      </form>
    <?php
        }
    ?>
 </body>
</html>
